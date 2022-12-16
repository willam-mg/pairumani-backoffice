<?php
namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Models\Habitacion;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Response;
use App\Traits\ReservaTrait;

class HelpersController extends Controller
{
    use ReservaTrait;
    /**
     * Precio total reserva.
     * Calcula el precio total de la reserva.
     * @group Reserva
     * @bodyParam habitacion_id integer
     * @bodyParam fecha_inicio date (Y-m-d)
     * @bodyParam fecha_fin date (Y-m-d)
     * @response scenario=success 
     *  10000
     * 
     */
    public function calcularTotal(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'habitacion_id' => 'required',
            'fecha_inicio' => 'required',
            'fecha_fin' => 'required',
        ]);

        if ($validator->fails()) {
            $responseArr['message'] = $validator->errors();;
            return response()->json($responseArr, Response::HTTP_BAD_REQUEST);
        }

        $habitacion = Habitacion::find($request->habitacion_id);
        if (!$habitacion) {
            return response()->json(['success' => 'false', 'message' => 'La habitacion no existe'], 410);
        }
        $total = $this->precioReserva($request->fecha_inicio, $request->fecha_fin, $habitacion->precio);
        
        return response()->json($total, Response::HTTP_BAD_REQUEST);
    }
}
