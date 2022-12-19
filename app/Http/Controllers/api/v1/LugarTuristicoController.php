<?php
namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Models\LugarTuristico;
use App\Models\ReservaLugarTuristico;
use App\Traits\Socket;
use Illuminate\Http\Request;

class LugarTuristicoController extends Controller
{
    use Socket;

    /**
     * Lugares gastronomicos.
     * Listado de Lugares Turisticos Gastronomicos
     * 
     * @response scenario=success [
     * {
     *       "nombre": "Pairumani",
     *       "descripcion": "<p>Recorrido por todo el parque</p>",
     *       "precio_recorrido": "500.00",
     *       "lat": "-17.38918918180772",
     *       "lng": "-66.15840481762962",
     *       "tipo": "Gastronomia",
     *       "foto": "http://pairumanibackoffice.test/public/imagenes/lugaresturisticos/lugar_210422114750.jpg"
     * }
     * ]
     */
    public function lugaresgastronomia()
    {
        $lugares = LugarTuristico::where('tipo', 'Gastronomia')->get();
        $detalles = [];
        foreach ($lugares as $lugar) {
            array_push($detalles, [
                'id' => $lugar->id,
                'nombre' => $lugar->nombre,
                'descripcion' => $lugar->descripcion,
                'precio_recorrido' => $lugar->precio_recorrido,
                'lat' => $lugar->lat,
                'lng' => $lugar->lng,
                'tipo' => $lugar->tipo,
                'foto' => $lugar->fotourl,
                'galeria' => $lugar->fotos->map(function ($foto) {
                    return [
                        'foto' => $foto->fotourl,
                    ];
                }),
            ]);
        }
        return response()->json(['success' => 'true', 'data' => $detalles], 200);
    }

    /**
     * Lugares de turismo.
     * Listado de Lugares Turisticos Turismo
     * 
     * @response scenario=success {
     *       "nombre": "Pairumani",
     *       "descripcion": "<p>Recorrido por todo el parque</p>",
     *       "precio_recorrido": "500.00",
     *       "lat": "-17.38918918180772",
     *       "lng": "-66.15840481762962",
     *       "tipo": "Turismo",
     *       "foto": "http://pairumanibackoffice.test/public/imagenes/lugaresturisticos/lugar_210422114750.jpg"
     * }
     */
    public function lugaresturismo()
    {
        $lugares = LugarTuristico::where('tipo', 'Turismo')->get();
        $detalles = [];
        foreach ($lugares as $lugar) {
            array_push($detalles, [
                'id' => $lugar->id,
                'nombre' => $lugar->nombre,
                'descripcion' => $lugar->descripcion,
                'precio_recorrido' => $lugar->precio_recorrido,
                'lat' => $lugar->lat,
                'lng' => $lugar->lng,
                'tipo' => $lugar->tipo,
                'foto' => $lugar->fotourl,
                'galeria' => $lugar->fotos->map(function ($foto) {
                    return [
                        'foto' => $foto->fotourl,
                    ];
                }),
            ]);
        }
        return response()->json(['success' => 'true', 'data' => $detalles], 200);
    }

    /**
     * Detalle Lugar Turistico.
     * 
     * @bodyParam bearer_token string required Campo unico del cliente autenticado para acceder a esta ruta. Example: drWa9YnurQFx6bY8rfsRcdMXsXpLvTUWSEkqQHivBDLJpbFv7E31BxxBcj6z
     * @bodyParam turismo_id int Id del lugar turistico. Example: 2
     * @response scenario=success {
     *       "nombre": "Plaza Principal",
     *       "descripcion": "<p>asdafafafmans,mfna,s</p>",
     *       "precio_recorrido": "250.00",
     *       "lat": "-17.39375549279761",
     *       "lng": "-66.15695642476157",
     *       "tipo": "Turismo",
     *       "foto": "http://pairumanibackoffice.test/public/imagenes/lugaresturisticos/lugar_210513145930.jpg"
     * }
     */
    public function turismodetalle(Request $request)
    {
        $lugar = LugarTuristico::where('id', $request->post('turismo_id'))->first();
        $detalles = [];
        array_push($detalles, [
            'nombre' => $lugar->nombre,
            'descripcion' => $lugar->descripcion,
            'precio_recorrido' => $lugar->precio_recorrido,
            'lat' => $lugar->lat,
            'lng' => $lugar->lng,
            'tipo' => $lugar->tipo,
            'foto' => $lugar->fotourl,
            'galeria' => $lugar->fotos->map(function ($foto) {
                return [
                    'foto' => $foto->fotourl,
                ];
            }),
        ]);
        return response()->json(['success' => 'true', 'data' => $detalles], 200);
    }

    /**
     * Reservas Lugar Turistico.
     * 
     * @authenticated
     * @bodyParam cliente_id integer required Id del cliente. Example: 5
     * @bodyParam lugar_turistico_id integer required Id del lugar turistico. Example: 1
     * @bodyParam fecha date required Fecha de registro reserva . Example: 2021-06-10
     * @bodyParam hospedaje_id integer required Id del hospedaje. Example: 10
     * @bodyParam precio number required Precio del recorrido Lugar Turistico. Example: 500
     * @response scenario=success {
     *   "success": "true",
     *   "data": "Lugar Turistico reservado"
     * }
     */
    public function reservalugarturistico(Request $request)
    {
        $reserva = new ReservaLugarTuristico();
        $reserva->cliente_id = $request->post('cliente_id');
        $reserva->lugar_turistico_id = $request->post('lugar_turistico_id');
        $reserva->fecha = $request->post('fecha');
        $reserva->estado = 'Activo';
        $reserva->hospedaje_id = $request->post('hospedaje_id');
        $reserva->precio = $request->post('precio');
        $reserva->save();
        $this->emmit();
        return response()->json(['success' => 'true', 'data' => 'Lugar Turistico reservado'], 200);
    }    
}
