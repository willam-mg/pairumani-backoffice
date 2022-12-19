<?php
namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Models\Hospedaje;
use Illuminate\Http\Request;

class HospedajeController extends Controller
{
    /**
     * Format all hospedaje information.
     * retorna toda la informacion del hospedajes.
     * @param Hospedaje[]
     * @return Hospedajes[]
     */
    private function formatMisHospedajes($hospedajes)
    {
        return  $hospedajes->map(function ($hospedaje) {
            return [
                'id' => $hospedaje->id,
                'checkin' => $hospedaje->fecha_checkin,
                'checkout' => $hospedaje->fecha_checkout,
                'adultos' => $hospedaje->adultos,
                'niños' => $hospedaje->niños,
                'precio' => $hospedaje->precio_promocion ? $hospedaje->precio_promocion : $hospedaje->precio,
                'estado' => $hospedaje->estado,
                "cliente" => $hospedaje->cliente ? [
                    'nombre' => $hospedaje->cliente->nombrecompleto,
                    'celular' => $hospedaje->cliente->celular,
                    'telefono' => $hospedaje->cliente->telefono,
                    'ciudad' => $hospedaje->cliente->ciudad,
                    'pais' => $hospedaje->cliente->pais,
                    'oficio' => $hospedaje->cliente->oficio,
                    'email' => $hospedaje->cliente->email,
                ] : null,
                'habitacion' => $hospedaje->habitacion ? [
                    'nombre' => $hospedaje->habitacion->nombre,
                    'num_habitacion' => $hospedaje->habitacion->num_habitacion,
                    'precio' => $hospedaje->habitacion->precio,
                    'foto' => $hospedaje->habitacion->fotourl,
                ] : null,
                'transportes' => $hospedaje->detalletransportes->map(function ($detalle) {
                    $transporte = $detalle->transporte;
                    return [
                        'nombre' => $transporte ? $transporte->nombre : null,
                        'precio' => $detalle->precio,
                        'foto' => $transporte ? $transporte->fotourl : null,
                    ];
                }),
                'lugares' => $hospedaje->lugares->map(function ($detalle) {
                    $lugarturistico = $detalle->lugarturistico;
                    return [
                        'nombre' => $lugarturistico ? $lugarturistico->nombre : null,
                        'precio' => $detalle->precio,
                        'fecha' => $detalle->fecha,
                        'tipo' => $lugarturistico ? $lugarturistico->tipo : null,
                        'foto' => $lugarturistico ? $lugarturistico->fotourl : null,
                    ];
                }),
                'restaurante' => $hospedaje->restaurantes->map(function ($detalle) {
                    return [
                        'fecha' => $detalle->fecha,
                        'hora' => $detalle->hora,
                        'productos' => $detalle->detalles->map(function ($producto) use ($detalle) {
                            $objProducto = $producto->producto;
                            $productoNombre = null;
                            if ($objProducto) {
                                $productoNombre = $objProducto->tamano ? $objProducto->tamano->nombre : null;
                            }
                            $opcionNombre = null;
                            if ($objProducto) {
                                $opcionNombre = $objProducto->opcion ? $objProducto->opcion->nombre : null;
                            }
                            $precioTamano = null;
                            $objDetalle = $detalle->detalle;
                            if ($objDetalle) {
                                $precioTamano = $objDetalle->detalleproducto ? $objDetalle->detalleproducto->precio_tamanho : null;
                            }
                            return [
                                'producto' => $producto ? $producto->nombre : null,
                                'precio_producto' => $detalle->detalle ? $detalle->detalle->precio : null,
                                'opcion' => $opcionNombre,
                                'tamaño' => [
                                    'nombre' => $productoNombre,
                                    'precio_tamaño' => $precioTamano,
                                ],
                            ];
                        }),
                    ];
                }),
                'cafeteria' => $hospedaje->cafeterias->map(function ($detalle) {
                    return [
                        'fecha' => $detalle->fecha,
                        'hora' => $detalle->hora,
                        'productos' => $detalle->detalles->map(function ($producto) use ($detalle) {
                            $objProducto = $producto->producto;
                            $productoNombre = null;
                            if ($objProducto) {
                                $productoNombre = $objProducto->tamano ? $objProducto->tamano->nombre : null;
                            }
                            $opcionNombre = null;
                            if ($objProducto) {
                                $opcionNombre = $objProducto->opcion ? $objProducto->opcion->nombre : null;
                            }
                            $precioTamano = null;
                            $objDetalle = $detalle->detalle;
                            if ($objDetalle) {
                                $precioTamano = $objDetalle->detalleproducto ? $objDetalle->detalleproducto->precio_tamanho : null;
                            }
                            return [
                                'producto' => $producto ? $producto->nombre : null,
                                'precio_producto' => $detalle->detalle ? $detalle->detalle->precio : null,
                                'opcion' => $opcionNombre,
                                'tamaño' => [
                                    'nombre' => $productoNombre,
                                    'precio_tamaño' => $precioTamano,
                                ],
                            ];
                        }),
                    ];
                }),
                'totales' => [
                    'hospedaje' => $hospedaje->precio_promocion ? $hospedaje->precio_promocion : $hospedaje->precio,
                    'transportes' => number_format(pageTotal($hospedaje->detalletransportes, 'precio'), 2),
                    'restaurante' => number_format(pageTotal($hospedaje->restaurantes, 'total'), 2),
                    'cafeteria' => number_format(pageTotal($hospedaje->cafeterias, 'total'), 2),
                    'lugarturistico' => number_format(pageTotal($hospedaje->lugares, 'precio'), 2),
                    'totalpagar' => number_format($hospedaje->total(), 2),
                ],
            ];
        });
    }

    
    /**
     * Mis hospedajes.
     * 
     * @group Hospedajes
     * @authenticated
     * @bodyParam bearer_token string required Campo unico del cliente autenticado para acceder a esta ruta. Example: drWa9YnurQFx6bY8rfsRcdMXsXpLvTUWSEkqQHivBDLJpbFv7E31BxxBcj6z
     * @bodyParam cliente_id int required Id del cliente. Example: 1
     * @response scenario=success {
     *       "id": 13,
     *       "checkin": "2021-05-20",
     *       "checkout": "2021-05-22",
     *       "adultos": 4,
     *       "niños": 2,
     *       "precio": "300.00",
     *       "estado": "Ocupado",
     *       "cliente": {
     *           "nombre": "Julian Gonzales Llanos",
     *           "celular": "62101485",
     *           "telefono": "42682265",
     *           "ciudad": "La Paz",
     *           "pais": "Bolivia",
     *           "oficio": "Albañil",
     *           "email": "julian@gmail.com"
     *       },
     *       "habitacion": {
     *           "nombre": "Habitacion 26",
     *           "num_habitacion": "26",
     *           "precio": "450.00",
     *           "foto": "http://pairumanibackoffice.test/public/imagenes/habitaciones/habitacion_210521090607.jfif"
     *       },
     *       "transportes": [],
     *       "lugares": [
     *           {
     *               "nombre": "Pairumani",
     *               "precio": "500.00",
     *               "fecha": "2021-06-04",
     *               "tipo": "Gastronomia",
     *               "foto": "http://pairumanibackoffice.test/public/imagenes/lugaresturisticos/lugar_210422114750.jpg"
     *           },
     *           {
     *               "nombre": "Pairumani",
     *               "precio": "500.00",
     *               "fecha": "2021-06-11",
     *               "tipo": "Gastronomia",
     *               "foto": "http://pairumanibackoffice.test/public/imagenes/lugaresturisticos/lugar_210422114750.jpg"
     *           },
     *           {
     *               "nombre": "Pairumani",
     *               "precio": "500.00",
     *               "fecha": "2021-06-10",
     *               "tipo": "Gastronomia",
     *               "foto": "http://pairumanibackoffice.test/public/imagenes/lugaresturisticos/lugar_210422114750.jpg"
     *           }
     *       ],
     *       "restaurante": [
     *           {
     *               "fecha": "2021-06-09",
     *               "hora": "17:35:40",
     *               "productos": [
     *                   {
     *                       "producto": "Pique macho",
     *                       "precio_producto": "100.00",
     *                       "opcion": "Papas fritas",
     *                       "tamaño": {
     *                           "nombre": "Pequeño",
     *                           "precio_tamaño": "40.00"
     *                       }
     *                   }
     *               ]
     *           },
     *           {
     *               "fecha": "2021-06-09",
     *               "hora": "18:40:48",
     *               "productos": [
     *                   {
     *                       "producto": "Pique macho",
     *                       "precio_producto": "100.00",
     *                       "opcion": "Papas fritas",
     *                       "tamaño": {
     *                           "nombre": "Pequeño",
     *                           "precio_tamaño": "40.00"
     *                       }
     *                   }
     *               ]
     *           }
     *       ],
     *       "totales": {
     *           "hospedaje": "300.00",
     *           "transportes": "0.00",
     *           "restaurante": "980.00",
     *           "lugarturistico": "1,500.00",
     *           "totalpagar": "2,780.00"
     *       }
     * }
     */
    public function mishospedajes(Request $request)
    {
        $hospedajes = Hospedaje::where('cliente_id', $request->post('cliente_id'))->orderBy('id', 'DESC')->get();
        $detalles = $this->formatMisHospedajes($hospedajes);
        return response()->json(['success' => 'true', 'data' => $detalles], 200);
    }

    /**
     * Hospedajes ocupados.
     * Hospedajes ocupados del cliente
     * 
     * @group Hospedajes
     * @bodyParam bearer_token string required Campo unico del cliente autenticado para acceder a esta ruta. Example: drWa9YnurQFx6bY8rfsRcdMXsXpLvTUWSEkqQHivBDLJpbFv7E31BxxBcj6z
     * @bodyParam cliente_id int required Id del cliente. Example: 1
     * @response scenario=success {
     *       'id' => 39,
     *       "checkin": "2021-05-20",
     *       "checkout": "2021-05-22",
     *       "adultos": 4,
     *       "niños": 2,
     *       "precio": "300.00",
     *       "estado": "Ocupado",
     *       "cliente": {
     *           "nombre": "Julian Gonzales Llanos",
     *           "celular": "62101485",
     *           "telefono": "42682265",
     *           "ciudad": "La Paz",
     *           "pais": "Bolivia",
     *           "oficio": "Albañil",
     *           "email": "julian@gmail.com"
     *       },
     *       "habitacion": {
     *           "nombre": "Habitacion 26",
     *           "num_habitacion": "26",
     *           "precio": "450.00",
     *           "foto": "http://pairumanibackoffice.test/public/imagenes/habitaciones/habitacion_210521090607.jfif"
     *       },
     * }
     */
    public function mishospedajesocupados(Request $request)
    {
        $hospedajes = Hospedaje::where('cliente_id', $request->post('cliente_id'))->where('estado', 'Ocupado')->orderBy('id', 'DESC')->get();
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
                "cliente" => [
                    'nombre' => $hospedaje->cliente->nombrecompleto,
                    'celular' => $hospedaje->cliente->celular,
                    'telefono' => $hospedaje->cliente->telefono,
                    'ciudad' => $hospedaje->cliente->ciudad,
                    'pais' => $hospedaje->cliente->pais,
                    'oficio' => $hospedaje->cliente->oficio,
                    'email' => $hospedaje->cliente->email,
                ],
                'habitacion' => [
                    'nombre' => $hospedaje->habitacion->nombre,
                    'num_habitacion' => $hospedaje->habitacion->num_habitacion,
                    'precio' => $hospedaje->habitacion->precio,
                    'foto' => $hospedaje->habitacion->fotourl,
                ],



            ]);
        }
        return response()->json(['success' => 'true', 'data' => $detalles], 200);
    }
}
