<?php
namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Models\Evento;
use App\Models\GaleriaHotel;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Sliders.
     * Listado de la Galeria del Hotel.
     * 
     * @group Home
     * @bodyParam bearer_token string required Campo unico del cliente autenticado para acceder a esta ruta. Example: drWa9YnurQFx6bY8rfsRcdMXsXpLvTUWSEkqQHivBDLJpbFv7E31BxxBcj6z
     * @response scenario=success {
     *   "id": 1,
     *   "foto": "http://pairumanibackoffice.test/public/imagenes/hotel/galeria/foto_210514173512.jpg",
     *   "descripcion": "<p>sadsafasfa</p>"
     * }
     */
    public function sliders()
    {
        $sliders = GaleriaHotel::all();
        $detalles = [];
        foreach ($sliders as $slider) {
            array_push($detalles, [
                'id' => $slider->id,
                'foto' => $slider->fotourl,
                'descripcion' => $slider->descripcion,
            ]);
        }
        return response()->json(['success' => 'true', 'data' => $detalles], 200);
    }

    /**
     * Eventos.
     * Listado de eventos.
     * 
     * @group Home
     * @bodyParam bearer_token string required Campo unico del cliente autenticado para acceder a esta ruta. Example: drWa9YnurQFx6bY8rfsRcdMXsXpLvTUWSEkqQHivBDLJpbFv7E31BxxBcj6z
     * @response scenario=success {
     *       "nombre": "sadaasfasa",
     *       "descripcion": "<p>asfasfasfas</p>",
     *       "fecha": "2021-04-24",
     *       "foto": "http://pairumanibackoffice.test/public/imagenes/eventos/evento_210422123859.jpg"
     * }
     */
    public function eventos()
    {
        $eventos = Evento::all();
        $detalles = [];
        foreach ($eventos as $evento) {
            array_push($detalles, [
                'id' => $evento->id,
                'nombre' => $evento->nombre,
                'descripcion' => $evento->descripcion,
                'fecha' => Carbon::parse(strtotime($evento->fecha))->formatLocalized('%d de %B del %Y'),
                'foto' => $evento->fotourl,
                'galeria' => $evento->fotos->map(function ($foto) {
                    return [
                        'foto' => $foto->fotourl,
                    ];
                }),
            ]);
        }
        return response()->json(['success' => 'true', 'data' => $detalles], 200);
    }
}