<?php

namespace App\Http\Controllers\api\v1;

use App\Models\Reserva;
use App\Models\Promocion;
use App\Models\Habitacion;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\HabitacionCategoria;
use App\Http\Controllers\Controller;
use App\Traits\Socket;

class HabitacionController extends Controller
{
    use Socket;
    /**
     * Maping reservas.
     * @param Reserva[]
     * @return Reserva[]
     */
    private function mapMisReservas($reservas)
    {
        return  $reservas->map(function ($reserva) {
            $cliente = $reserva->cliente;
            $habitacion = $reserva->habitacion;
            return [
                'id' => $reserva->id,
                'checkin' => $reserva->checkin->format('Y-m-d'),
                'checkout' => $reserva->checkout->format('Y-m-d'),
                'adultos' => $reserva->adultos,
                'niños' => $reserva->niños,
                'estado' => $reserva->estado,
                "cliente" => $cliente ? [
                    'nombre' => $cliente->nombrecompleto,
                    'celular' => $cliente->celular,
                    'telefono' => $cliente->telefono,
                    'ciudad' => $cliente->ciudad,
                    'pais' => $cliente->pais,
                    'oficio' => $cliente->oficio,
                    'email' => $cliente->email,
                ] : null,
                'habitacion' => $habitacion ? [
                    'nombre' => $habitacion->nombre,
                    'num_habitacion' => $habitacion->num_habitacion,
                    'precio' => $habitacion->precio,
                    'foto' => $habitacion->foto_url,
                    'estado' => $habitacion->estado,
                    'categoria'=> $habitacion->categoria?[
                        'nombre'=> $habitacion->categoria->nombre,
                        'descripcion'=> $habitacion->categoria->descripcion,
                        'foto'=> $habitacion->categoria->foto_url,
                    ]:null,
                ] : null,
            ];
        });
    }


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
     * Promociones.
     * Listado de promociones de las habitaciones
     * 
     * @group Habitaciones
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

    /**
     * Nueva reserva.
     * Creacion de la Reserva de una Habitacion
     * 
     * @group Habitaciones
     * @authenticated
     * @bodyParam bearer_token string required Campo unico del cliente autenticado para acceder a esta ruta. Example: drWa9YnurQFx6bY8rfsRcdMXsXpLvTUWSEkqQHivBDLJpbFv7E31BxxBcj6z
     * @bodyParam checkin date required Fecha checkin. Example: 2021-05-17
     * @bodyParam checkout date required Fecha checkout. Example: 2021-05-19
     * @bodyParam adultos int required Canridad de adultos en la habitacion. Example: 3
     * @bodyParam ninos int required Cantidad de niños en la habitacion. Example: 2
     * @bodyParam cliente_id int required Id del cliente a reservar. Example: 1
     * @bodyParam habitacion_id int required Id de la habitacion. Example: 1
     * @response scenario=success {
     *       "checkin": "2021-05-14",
     *       "checkout": "2021-05-16",
     *       "adultos": "3",
     *       "niños": "2",
     *       "cliente_id": 7,
     *       "habitacion_id": 8,
     *       "id": 8
     * }
     */
    public function reservahabitacion(Request $request)
    {
        $habitacion = Habitacion::where('id', $request->post('habitacion_id'))->first();
        if ($habitacion->estado == 'Reservado') {
            return response()->json(['success' => 'false', 'data' => 'La habitacion ya fue reservada'], 409);
        }
        //creacion de la reserva
        $reserva = new Reserva();
        $reserva->checkin = $request->post('checkin');
        $reserva->checkout = $request->post('checkout');
        $reserva->adultos = $request->post('adultos');
        $reserva->niños = $request->post('ninos');
        $reserva->cliente_id = $request->post('cliente_id');
        $reserva->habitacion_id = $request->post('habitacion_id');
        $reserva->save();

        //cambio de estado de la habitacion
        $habitacion->estado = 'Reservado';
        $habitacion->save();
        $this->emmit();
        return response()->json(['success' => 'true', 'data' => $reserva], 200);
    }

    /**
     * Mis reservas.
     * Muestra la lsita de las reservas pendientes o activas
     * 
     * @group Habitaciones
     * @authenticated
     * @bodyParam cliente_id int required Id del cliente. Example: 1
     * @bodyParam estado string optional "Reservado", "Activo". Example: "Reservado"
     * @response scenario=success {
     *       "id": 5,
     *      "checkin": "2021-05-06",
     *       "checkout": "2021-05-08",
     *      "adultos": 3,
     *       "niños": 2,
     *       "cliente": {
     *           "nombre": "Paola Montecinos Pardo",
     *           "celular": "8888888",
     *           "telefono": "9999999",
     *           "ciudad": "Cochabamba",
     *           "pais": "Bolivia",
     *           "oficio": "Arquitecto",
     *           "email": "paola@gmail.com"
     *       },
     *       "habitacion": {
     *           "nombre": "Habitacion 20",
     *           "num_habitacion": "20",
     *           "precio": "450.00",
     *           "foto": "http://pairumanibackoffice.test/public/imagenes/habitaciones/habitacion_210506153104.jfif"
     *       }
     * }
     */
    public function misreservas(Request $request)
    {
        $reservas = Reserva::where('cliente_id', $request->post('cliente_id'))
            ->when($request->estado, function($query) use ($request) {
                $query->where('estado', '=', $request->estado ?: 'Reservado');
            })->get();
        $detalles = $this->mapMisReservas($reservas);
        return response()->json(['success' => 'true', 'data' => $detalles], 200);
    }
}
