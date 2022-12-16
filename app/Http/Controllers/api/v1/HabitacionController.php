<?php

namespace App\Http\Controllers\api\v1;

use Carbon\Carbon;
use App\Models\Evento;
use App\Models\Cliente;
use App\Models\Reserva;
use App\Models\Hospedaje;
use App\Models\Promocion;
use App\Models\Habitacion;
use App\Models\Transporte;
use Illuminate\Support\Str;
use App\Models\GaleriaHotel;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\LugarTuristico;
use App\Events\RecoverPassword;
use App\Models\ReservaCafeteria;
use App\Models\CafeteriaProducto;
use App\Models\CafeteriaCategoria;
use App\Models\ReservaRestaurante;
use Illuminate\Support\Facades\DB;
use App\Models\HabitacionCategoria;
use App\Models\RestauranteProducto;
use App\Http\Controllers\Controller;
use App\Models\RestauranteCategoria;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\ReservaLugarTuristico;
use App\Models\CafeteriaDetalleReserva;
use App\Models\RestauranteDetalleReserva;
use Illuminate\Support\Facades\Validator;
use App\Models\HospedajeDetalleTransporte;
use App\Models\CafeteriaDetalleReservaProducto;
use App\Models\RestauranteDetalleReservaProducto;
use App\Traits\Socket;

class HabitacionController extends Controller
{
    /**
     * Listado de las categorias.
     * Muestra la lista de todas las categorias de las habitaciones.
     * 
     * @group Habitaciones
     * @response scenario=success {
     *   "id": 4,
     *   "nombre": "Habitacion Presidencial",
     *   "descripcion": "<p>sadsafasfa</p>",
     *   "foto": "http://pairumanibackoffice.test/public/imagenes/habitaciones/categorias/habitacioncategoria_210422124342.jpg"
     * }
     */
    public function habitacioncategorias()
    {
        $categorias = HabitacionCategoria::all();
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
     * Lista de habitaciones.
     * Listado de habitaciones segun la categoria que estan enlazadas.
     * 
     * @group Habitaciones
     * @bodyParam categoria_id int required Id de la categoria de la habitacion. Example: 1
     * @response scenario=success {
     *       "nombre": "Habitacion 1",
     *       "descripcion": "<p>asdafasfasfasfafafas</p>",
     *       "num_habitacion": 1,
     *       "precio": "850.00",
     *       "precio_promocion": "550.00",
     *       "capacidad_minima": "3",
     *       "capacidad_maxima": "7",
     *       "estado": "Disponible",
     *       "foto": "http://pairumanibackoffice.test/public/imagenes/habitaciones/habitacion_210516222401.jfif"
     * }
     * @response 404 {
     *       "success": "false",
     *       "message": "Categoria no se existe",
     * }
     */
    public function Habitaciones(Request $request)
    {
        if (!HabitacionCategoria::where('id', $request->post('categoria_id'))->exists()) {
            return response()->json(['success' => 'false', 'message' => 'Categoria no se existe'], 404);
        }
        $habitaciones = Habitacion::where('habitacion_categoria_id', $request->post('categoria_id'))->where('estado', 'Disponible')->get();
        $detalles = [];
        foreach ($habitaciones as $habitacion) {
            array_push($detalles, [
                'id' => $habitacion->id,
                'nombre' => $habitacion->nombre,
                'descripcion' => $habitacion->descripcion,
                'num_habitacion' => $habitacion->num_habitacion,
                'precio' => $habitacion->precio,
                'capacidad_minima' => $habitacion->capacidad_minima,
                'capacidad_maxima' => $habitacion->capacidad_maxima,
                'estado' => $habitacion->estado,
                'categoria' => $habitacion->categoria->nombre,
                'foto' => $habitacion->fotourl,
            ]);
        }
        return response()->json(['success' => 'true', 'data' => $detalles], 200);
    }

    /**
     * Detalle habitacion.
     * Muestra el detalle de una habitacion.
     * 
     * @group Habitaciones
     * @bodyParam habitacion_id int required Id de la habitacion para ver su detalle. Example: 1
     * @response scenario=success {
     *       "nombre": "asfasfasgfsagasga",
     *       "descripcion": "<p>asasfasfa</p>",
     *       "num_habitacion": 100,
     *       "precio": "250.00",
     *       "precio_promocion": "0.00",
     *       "capacidad_minima": "6",
     *       "capacidad_maxima": "8",
     *       "estado": "Reservado",
     *       "foto": "http://pairumanibackoffice.test/public/imagenes/habitaciones/habitacion_210430121313.jpg"
     * }
     */
    public function habitaciondetalle(Request $request)
    {
        $habitacion = Habitacion::where('id', $request->post('habitacion_id'))->first();
        $detalles = [];
        array_push($detalles, [
            'id' => $habitacion->id,
            'nombre' => $habitacion->nombre,
            'descripcion' => $habitacion->descripcion,
            'num_habitacion' => $habitacion->num_habitacion,
            'precio' => $habitacion->precio,
            'capacidad_minima' => $habitacion->capacidad_minima,
            'capacidad_maxima' => $habitacion->capacidad_maxima,
            'estado' => $habitacion->estado,
            'foto' => $habitacion->fotourl,
            'galeria' => $habitacion->fotos->map(function ($foto) {
                return [
                    'foto' => $foto->fotourl,
                ];
            }),
        ]);
        return response()->json(['success' => 'true', 'data' => $detalles], 200);
    }

    /**
     * Lista de habitaciones con categoria.
     * Listado de habitaciones a la categoria que pertenece.
     * 
     * @group Habitaciones
     * @response scenario=success {
     *       "nombre": "Habitacion 1",
     *       "descripcion": "<p>asdafasfasfasfafafas</p>",
     *       "num_habitacion": 1,
     *       "precio": "850.00",
     *       "precio_promocion": "550.00",
     *       "capacidad_minima": "3",
     *       "capacidad_maxima": "7",
     *       "estado": "Disponible",
     *       "categoria": "Habitacion Presidencial",
     *       "foto": "http://pairumanibackoffice.test/public/imagenes/habitaciones/habitacion_210516222401.jfif"
     * }
     */
    public function habitacionescategoria()
    {
        $habitaciones = Habitacion::where('estado', 'Disponible')->limit(10)->inRandomOrder()->get();
        $detalles = [];
        foreach ($habitaciones as $habitacion) {
            array_push($detalles, [
                'id' => $habitacion->id,
                'nombre' => $habitacion->nombre,
                'descripcion' => $habitacion->descripcion,
                'num_habitacion' => $habitacion->num_habitacion,
                'precio' => $habitacion->precio,
                'capacidad_minima' => $habitacion->capacidad_minima,
                'capacidad_maxima' => $habitacion->capacidad_maxima,
                'estado' => $habitacion->estado,
                'categoria' => $habitacion->categoria->nombre,
                'id_categoria' => $habitacion->categoria->id,
                'foto' => $habitacion->fotourl,
            ]);
        }
        return response()->json(['success' => 'true', 'data' => $detalles], 200);
    }

    /**
     * PROMOCION - Listado de promociones de las habitaciones
     * 
     * @response scenario=success {
     *       "nombre": "asdasfasfasfa",
     *       "descripcion": "<p>asfasfasfasfsafa</p>",
     *       "precio": "150.00",
     *       "estado": "Activo",
     *       "foto": "http://pairumanibackoffice.test/public/imagenes/promociones/promocion_210513161554.jpg"
     * }
     */
    public function promociones()
    {
        $promociones = Promocion::where('estado', 'Activo')->inRandomOrder()->limit(10)->get();
        $detalles = [];
        foreach ($promociones as $promocion) {
            array_push($detalles, [
                'id' => $promocion->id,
                'nombre' => $promocion->nombre,
                'descripcion' => $promocion->descripcion,
                'precio' => $promocion->precio,
                'estado' => $promocion->estado,
                'foto' => $promocion->fotourl,
                'habitacion_id' => $promocion->habitacion_id,
            ]);
        }
        return response()->json(['success' => 'true', 'data' => $detalles], 200);
    }
}
