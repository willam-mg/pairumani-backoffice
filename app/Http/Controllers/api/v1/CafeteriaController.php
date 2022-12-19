<?php
namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Models\CafeteriaCategoria;
use App\Models\CafeteriaDetalleReserva;
use App\Models\CafeteriaDetalleReservaProducto;
use App\Models\CafeteriaProducto;
use App\Models\ReservaCafeteria;
use App\Traits\Socket;
use Illuminate\Http\Request;

class CafeteriaController extends Controller
{
    use Socket;

    /**
     * Categorias.
     * Listado de Categorias Cafeteria
     * 
     * @group Cafeteria
     * @bodyParam bearer_token string required Campo unico del cliente autenticado para acceder a esta ruta. Example: drWa9YnurQFx6bY8rfsRcdMXsXpLvTUWSEkqQHivBDLJpbFv7E31BxxBcj6z
     * @response scenario=success {
     *       "nombre": "adasdasfasf",
     *       "descripcion": "<p>safasfasfasfa</p>",
     *       "foto": "http://pairumanibackoffice.test/public/imagenes/cafeteria/categorias/cafeteriacategoria_210422153310.jpg"
     * }
     */
    public function cafeteriacategorias()
    {
        $categorias = CafeteriaCategoria::all();
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
     * Listado de Productos Cafeteria segun a la Categoria que pertenecen
     * 
     * @group Cafeteria
     * @bodyParam bearer_token string required Campo unico del cliente autenticado para acceder a esta ruta. Example: drWa9YnurQFx6bY8rfsRcdMXsXpLvTUWSEkqQHivBDLJpbFv7E31BxxBcj6z
     * @bodyParam categoria_id int required Id de la categoria del producto. Example: 1
     * @response scenario=success {
     *       "nombre": "Pique macho",
     *       "descripcion": "<p>afasfasfasfasfasf</p>",
     *       "precio": "100.00",
     *       "foto": "http://pairumanibackoffice.test/public/imagenes/cafeteria/productos/producto_210423115837.jpg"
     * }
     */
    public function cafeteriaproductos(Request $request)
    {
        $productos = CafeteriaProducto::where('cafeteria_categoria_id', $request->post('categoria_id'))->get();
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
     * Detalle Producto Cafeteria.
     * 
     * @group Cafeteria
     * @bodyParam bearer_token string required Campo unico del cliente autenticado para acceder a esta ruta. Example: drWa9YnurQFx6bY8rfsRcdMXsXpLvTUWSEkqQHivBDLJpbFv7E31BxxBcj6z
     * @bodyParam producto_id int required Id del producto. Example: 1
     * @response scenario=success {
     *       "nombre": "Pique macho",
     *       "descripcion": "<p>afasfasfasfasfasf</p>",
     *       "precio": "100.00",
     *       "foto": "http://pairumanibackoffice.test/public/imagenes/cafeteria/productos/producto_210423115837.jpg"
     * }
     */
    public function cafeteriaproductodetalle(Request $request)
    {
        $producto = CafeteriaProducto::where('id', $request->post('producto_id'))->first();
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
     * Reservas cafeteria.
     * 
     * @group Cafeteria
     * @authenticated
     * @bodyParam hospedaje_id integer required Id del hospedaje. Example: 10
     * @bodyParam total number required Total pedidos productos restaurante. Example: 600
     * @bodyParam producto_id integer required Id del producto reservado . Example: 1
     * @bodyParam precio number required Precio del producto. Example: 100
     * @bodyParam cantidad number required Cantidad de productos reservados. Example: 3
     * @bodyParam opcion_id integer required Id de la opcion del producto. Example: 1
     * @bodyParam tamano_id integer required Ide del tamaño producto. Example: 2
     * @bodyParam preciotamano number required Precio del tamaño producto. Example: 40
     * @bodyParam datos array datos transporte. Example:{
     *      "hospedaje_id":"10",
     *      "total":"600",
     *       "datos":[
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
    public function reservacafeteria(Request $request)
    {
        $cafeteria = new ReservaCafeteria();
        $cafeteria->hospedaje_id = $request->post('hospedaje_id');
        $cafeteria->cliente_id = $request->post('cliente_id');
        $cafeteria->fecha = date('Y-m-d');
        $cafeteria->hora = date('H:i:s');
        $cafeteria->total = $request->post('total');
        $cafeteria->save();

        //DETALLE RESERVA
        $detalles = $request->post('datos');
        foreach ($detalles as $value) {
            $detalle = new CafeteriaDetalleReserva();
            $detalle->cafeteria_reserva_id = $cafeteria->id;
            $detalle->cafeteria_producto_id = $value['producto_id'];
            $detalle->precio = $value['precio'];
            $detalle->cantidad = $value['cantidad'];
            $detalle->save();

            $detalleproducto = new CafeteriaDetalleReservaProducto();
            $detalleproducto->cafeteria_detalle_reserva_id = $detalle->id;
            $detalleproducto->cafeteria_producto_opciones_id = $value['opcion_id'];
            $detalleproducto->cafeteria_producto_tamano_id = $value['tamano_id'];
            $detalleproducto->precio_tamanho = $value['preciotamano'];
            $detalleproducto->save();
        }
        $this->emmit();
        return response()->json(['success' => 'true', 'data' => 'Productos Agregados'], 200);
    }
}
