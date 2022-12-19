<?php
namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Models\ReservaRestaurante;
use App\Models\RestauranteCategoria;
use App\Models\RestauranteDetalleReserva;
use App\Models\RestauranteDetalleReservaProducto;
use App\Models\RestauranteProducto;
use App\Traits\Socket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RestauranteController extends Controller
{
    use Socket;

    /**
     * Categorias.
     * Listado de Categorias Restaurante.
     * 
     * @response scenario=success {
     *       "nombre": "adasdasfasf",
     *       "descripcion": "<p>safasfasfasfa</p>",
     *       "foto": "http://pairumanibackoffice.test/public/imagenes/restaurantes/categorias/restaurantecategoria_210422153310.jpg"
     * }
     */
    public function restaurantecategorias()
    {
        $categorias = RestauranteCategoria::all();
        $detalles = [];
        foreach ($categorias as $categoria) {
            array_push($detalles, [
                'id' => $categoria->id,
                'nombre' => $categoria->nombre,
                'descripcion' => $categoria->descripcion,
                'foto' => $categoria->fotourl,
            ]);
        }
        return response()->json(['success' => 'true', 'data' => $detalles], 200);
    }

    /**
     * Productos.
     * Listado de Productos Restaurante segun a la Categoria que pertenecen.
     * 
     * @bodyParam categoria_id int required Id de la categoria del producto. Example: 1
     * @response scenario=success {
     *       "nombre": "Pique macho",
     *       "descripcion": "<p>afasfasfasfasfasf</p>",
     *       "precio": "100.00",
     *       "foto": "http://pairumanibackoffice.test/public/imagenes/restaurantes/productos/producto_210423115837.jpg"
     * }
     */
    public function restauranteproductos(Request $request)
    {
        $productos = RestauranteProducto::where('restaurante_categoria_id', $request->post('categoria_id'))->get();
        $detalles = [];
        foreach ($productos as $producto) {
            array_push($detalles, [
                'id' => $producto->id,
                'nombre' => $producto->nombre,
                'descripcion' => $producto->descripcion,
                'precio' => $producto->precio,
                'foto' => $producto->fotourl,
            ]);
        }
        return response()->json(['success' => 'true', 'data' => $detalles], 200);
    }

    /**
     * Detalle producto.
     * Deatelle Producto Restaurante.
     * 
     * @bodyParam producto_id int required Id del producto. Example: 1
     * @response scenario=success {
     *       "nombre": "Pique macho",
     *       "descripcion": "<p>afasfasfasfasfasf</p>",
     *       "precio": "100.00",
     *       "foto": "http://pairumanibackoffice.test/public/imagenes/restaurantes/productos/producto_210423115837.jpg"
     * }
     */
    public function productodetalle(Request $request)
    {
        $producto = RestauranteProducto::where('id', $request->post('producto_id'))->first();
        $detalles = [];
        array_push($detalles, [
            'id' => $producto->id,
            'nombre' => $producto->nombre,
            'descripcion' => $producto->descripcion,
            'precio' => $producto->precio,
            'foto' => $producto->fotourl,
            'galeria' => $producto->fotos->map(function ($foto) {
                return [
                    'foto' => $foto->fotourl,
                ];
            }),
            'opciones' => $producto->opciones->map(function ($opcion) {
                return [
                    'id' => $opcion->id,
                    'nombre' => $opcion->nombre,
                ];
            }),
            'tamanos' => $producto->tamanos->map(function ($tamano) {
                return [
                    'id' => $tamano->id,
                    'nombre' => $tamano->nombre,
                    'precio' => $tamano->precio,
                ];
            }),
        ]);
        return response()->json(['success' => 'true', 'data' => $detalles], 200);
    }

    /**
     * Reservas.
     * Reservas de restaurante.
     * 
     * @group Restaurante
     * @authenticated
     * @bodyParam hospedaje_id integer required Id del hospedaje. Example: 10
     * @bodyParam cliente_id integer required Id del hospedaje. Example: 10
     * @bodyParam total number required Total pedidos productos restaurante. Example: 600
     * @bodyParam datos array datos transporte. Example:{
     *      "hospedaje_id":"10",
     *      "total":"600",
     *      "datos":[
     *           {
     *               "producto_id":"1",
     *               "cantidad":"2",
     *               "precio":"100",
     *               "opcion_id":"2",
     *               "tamano_id":"1",
     *               "preciotamano":"20"
     *           },
     *           {
     *               "producto_id":"1",
     *               "cantidad":"3",
     *               "precio":"100",
     *               "opcion_id":"2",
     *               "tamano_id":"1",
     *               "preciotamano":"20"
     *           }
     *       ]
     *   }
     * @response scenario=success {
     *   "success": "true",
     *   "data": "Productos Agregados"
     * }
     */
    public function reservarestaurante(Request $request)
    {
        try {
            DB::beginTransaction();
            $restaurante = new ReservaRestaurante();
            $restaurante->hospedaje_id = $request->post('hospedaje_id');
            $restaurante->cliente_id = $request->post('cliente_id');
            $restaurante->fecha = date('Y-m-d');
            $restaurante->hora = date('H:i:s');
            $restaurante->total = floatVal($request->post('total'));
            $restaurante->save();

            //DETALLE RESERVA
            $detalles = $request->post('datos');
            foreach ($detalles as $value) {
                $detalle = new RestauranteDetalleReserva();
                $detalle->restaurante_reserva_id = $restaurante->id;
                $detalle->restaurante_producto_id = $value['producto_id'];
                $detalle->precio = $value['precio'];
                $detalle->cantidad = $value['cantidad'];
                if (!$detalle->save()) {
                    throw new \Exception($detalle->errors);
                }

                $detalleproducto = new RestauranteDetalleReservaProducto();
                $detalleproducto->restaurante_detalle_reserva_id = $detalle->id;
                $detalleproducto->restaurante_producto_opciones_id = $value['opcion_id'];
                $detalleproducto->restaurante_producto_tamano_id = $value['tamano_id'];
                $detalleproducto->precio_tamanho = $value['preciotamano'];
                $detalleproducto->save();
            }
            DB::commit();

            $this->emmit();
            return response()->json(['success' => 'true', 'data' => 'Productos Agregados'], 200);
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
    }

    /**
     * Mis reservas.
     * Muestra las reservas realizdas por el cliente.
     * 
     * @authenticated
     * @bodyParam cliente_id integer required Id del hospedaje. Example: 10
     * @response scenario=success {
     *   "success": "true",
     *   "data": [
     *      {
     *          'id' => 39,
     *          'checkin' => "2021-05-06",
     *          'checkout' => "2021-05-06",
     *          'adultos' => 2,
     *          'niños' => 2,
     *          'precio' => 100,
     *          'estado' => 'Ocupado',
     *          'habitacion' => [
     *              'nombre' => 'habitacion',
     *              'num_habitacion' => 71,
     *              'precio' => 1000,
     *              'foto' => 'photo.jpg',
     *          ],
     *          'restaurante' => [
     *              {
     *                  'fecha' => '2022-06-02',
     *                  'hora' => '12:45',
     *                  'productos' => [
     *                      {
     *                          'producto' => 'coca',
     *                          'precio_producto' => 15,
     *                          'opcion' => 'descuento',
     *                          'tamaño' =>[
     *                              'nombre' => 'grande,
     *                              'precio_tamaño' => 456,
     *                          ],
     *                      }
     *                  ]
     *              }
     *          ]
     *             
     *         
     *          'totales' => [
     *              'restaurante' => number_format(pageTotal($hospedaje->restaurantes,'total'),2),
     *              'totalpagar' => number_format($hospedaje->total(),2),
     *          ],
     *      }
     * ]
     */
    public function misReservasRestaurante(Request $request)
    {
        $hospedajes = ReservaRestaurante::where('cliente_id', $request->post('cliente_id'))->get();
        $detalles = [];
        foreach ($hospedajes as $hospedaje) {
            array_push($detalles, [
                'id' => $hospedaje->id,
                'checkin' => $hospedaje->fecha_checkin,
                'checkout' => $hospedaje->fecha_checkout,
                'adultos' => $hospedaje->adultos,
                'niños' => $hospedaje->niños,
                'precio' => $hospedaje->precio_promocion ? $hospedaje->precio_promocion : $hospedaje->precio,
                'estado' => $hospedaje->estado,
                'habitacion' => [
                    'nombre' => $hospedaje->habitacion->nombre,
                    'num_habitacion' => $hospedaje->habitacion->num_habitacion,
                    'precio' => $hospedaje->habitacion->precio,
                    'foto' => $hospedaje->habitacion->fotourl,
                ],
                'restaurante' => $hospedaje->restaurantes->map(function ($detalle) {
                    return [
                        'fecha' => $detalle->fecha,
                        'hora' => $detalle->hora,
                        'productos' => $detalle->detalles->map(function ($producto) use ($detalle) {
                            return [
                                'producto' => $producto->producto->nombre,
                                'precio_producto' => $detalle->detalle->precio,
                                'opcion' => $producto->producto->opcion->nombre,
                                'tamaño' => [
                                    'nombre' => $producto->producto->tamano->nombre,
                                    'precio_tamaño' => $detalle->detalle->detalleproducto->precio_tamanho,
                                ],
                            ];
                        }),
                    ];
                }),

                'totales' => [
                    'restaurante' => number_format(pageTotal($hospedaje->restaurantes, 'total'), 2),
                    'totalpagar' => number_format($hospedaje->total(), 2),
                ],
            ]);
        }
        return response()->json([
            'success' => 'true', 
            'data' => $detalles
        ], 200);
    }
}
