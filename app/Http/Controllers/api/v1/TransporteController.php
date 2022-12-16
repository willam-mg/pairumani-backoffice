<?php
namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Models\HospedajeDetalleTransporte;
use App\Models\Transporte;
use Illuminate\Http\Request;

class TransporteController extends Controller
{
    /**
     * TRANSPORTES - Listado de transportes
     * 
     * @bodyParam bearer_token string required Campo unico del cliente autenticado para acceder a esta ruta. Example: drWa9YnurQFx6bY8rfsRcdMXsXpLvTUWSEkqQHivBDLJpbFv7E31BxxBcj6z
     * @response scenario=success {
     *       "nombre": "Taxis corona",
     *       "descripcion": "<p>adasdasdasd</p>",
     *       "precio": "25.00"
     * }
     */
    public function transportes()
    {
        $transportes = Transporte::all();
        $detalles = [];
        foreach ($transportes as $transporte) {
            array_push($detalles, [
                'id' => $transporte->id,
                'nombre' => $transporte->nombre,
                'descripcion' => $transporte->descripcion,
                'precio' => $transporte->precio,
                'foto' => $transporte->fotourl,
            ]);
        }
        return response()->json(['success' => 'true', 'data' => $detalles], 200);
    }

    /**
     * TRANSPORTES - Detalle de transporte
     * 
     * @bodyParam bearer_token string required Campo unico del cliente autenticado para acceder a esta ruta. Example: drWa9YnurQFx6bY8rfsRcdMXsXpLvTUWSEkqQHivBDLJpbFv7E31BxxBcj6z
     * @bodyParam transporte_id int required Id del transporte para ver su detalle. Example: 1
     * @response scenario=success {
     *       "nombre": "Taxis corona",
     *       "descripcion": "<p>adasdasdasd</p>",
     *       "precio": "25.00",
     *       "foto": "foto.jpg"
     * }
     */
    public function transportedetalle(Request $request)
    {
        $transporte = Transporte::where('id', $request->post('transporte_id'))->first();
        $detalles = [];
        array_push($detalles, [
            'id' => $transporte->id,
            'nombre' => $transporte->nombre,
            'descripcion' => $transporte->descripcion,
            'precio' => $transporte->precio,
            'foto' => $transporte->fotourl,
        ]);
        return response()->json(['success' => 'true', 'data' => $detalles], 200);
    }

    /**
     * TRANSPORTES - Reserva transportes
     * 
     * @bodyParam bearer_token string required Campo unico del cliente autenticado para acceder a esta ruta. Example: drWa9YnurQFx6bY8rfsRcdMXsXpLvTUWSEkqQHivBDLJpbFv7E31BxxBcj6z
     * @bodyParam datos array datos transporte. Example:{
     *       "datos":[
     *	               {
     *		              "transporte_id":"2",
     *		              "precio":"25",
     *                    "hospedaje_id":"13"
     *	               },
     *	               {
     *		               "transporte_id":"2",
     *		               "precio":"25",
     *                     "hospedaje_id":"13"
     *	                }
     *               ]
     *            }
     */
    public function reservatransporte(Request $request)
    {
        $detalle = new HospedajeDetalleTransporte();
        $detalle->hospedaje_id = $request->post('hospedaje_id');
        $detalle->transporte_id = $request->post('transporte_id');
        $detalle->precio = $request->post('precio');
        $detalle->fecha = date('Y-m-d');
        $detalle->save();
        return response()->json(['success' => 'true', 'data' => 'Transportes agregados'], 200);
    }
}
