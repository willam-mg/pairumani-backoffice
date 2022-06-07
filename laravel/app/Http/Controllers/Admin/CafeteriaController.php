<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CafeteriaFormRequest;
use App\Models\Cliente;
use App\Models\ReservaCafeteria;
use App\Models\CafeteriaDetalleReserva;
use App\Models\CafeteriaDetalleReservaProducto;
use App\Models\CafeteriaProducto;
use App\Models\CafeteriaProductoOpcion;
use App\Models\CafeteriaProductoTamano;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;

class CafeteriaController extends Controller
{
    public function index(Request $request)
    {
        if ($request) {
            $query = trim($request->get('searchText'));
            $cafeterias = ReservaCafeteria::orderBy('id', 'desc')->paginate(7);
            return view('cafeteria.index', ["cafeterias" => $cafeterias, "searchText" => $query]);
        }
    }
    public function show(ReservaCafeteria $cafeteria)
    {
        return view('cafeteria.show', compact('cafeteria'));
    }
    public function create()
    {
        return view('cafeteria.create', [
            'cafeteria' => new ReservaCafeteria(),
            'clientes' => Cliente::get()->pluck('nombrecompleto','id'),
            'productos' => CafeteriaProducto::all(),
        ]);
    }
    public function opciones(Request $request, $id)
    {
        if($request->ajax()){
            $opcionescount = CafeteriaProductoOpcion::where('cafeteria_producto_id',$id)->count();
            if($opcionescount > 0){
                $opciones = CafeteriaProductoOpcion::where('cafeteria_producto_id',$id)->get();
            }else{
                $opciones = '';
            }
            return response()->json($opciones);
        }
    }
    public function tamanos(Request $request, $id)
    {
        if($request->ajax()){
            $tamañoscount = CafeteriaProductoTamano::where('cafeteria_producto_id',$id)->count();
            if($tamañoscount > 0){
                $tamaños = CafeteriaProductoTamano::where('cafeteria_producto_id',$id)->get();
            }else{
                $tamaños = '';
            }
            return response()->json($tamaños);
        }
    }
    public function store(CafeteriaFormRequest $request)
    {
        $Cafeteria = new ReservaCafeteria();
        $Cafeteria->cliente_id = $request->get('cliente_id');
        $Cafeteria->fecha = date('Y-m-d');
        $Cafeteria->hora = date('H:i:s');
        $Cafeteria->total = $request->get('total_venta');
        $Cafeteria->save();

        //DETALLE RESERVA
        $producto_id = $request->get('producto_id');
        $cantidad = $request->get('cantidad');
        $precio = $request->get('precio');
        $opcion_id = $request->get('opcion_id');
        $tamaño_id = $request->get('tamaño_id');
        $preciotamaño = $request->get('preciotamaño');

        $cont = 0;

        while ($cont < count($producto_id)) {
            $detalle = new CafeteriaDetalleReserva();
            $detalle->Cafeteria_reserva_id = $Cafeteria->id;
            $detalle->Cafeteria_producto_id = $producto_id[$cont];
            $detalle->precio = $precio[$cont];
            $detalle->cantidad = $cantidad[$cont];
            $detalle->save();

            $detalleproducto = new CafeteriaDetalleReservaProducto();
            $detalleproducto->Cafeteria_detalle_reserva_id = $detalle->id;
            $detalleproducto->Cafeteria_producto_opciones_id = $opcion_id[$cont];
            $detalleproducto->Cafeteria_producto_tamanho_id = $tamaño_id[$cont];
            $detalleproducto->precio_tamanho = $preciotamaño[$cont];
            $detalleproducto->save();

            $cont = $cont + 1;
        }

        return redirect()->route('cafeteria_index')->with('message', 'Guardado con éxito')->with('typealert', 'success');
    }
    public function destroy(ReservaCafeteria $Cafeteria)
    {
        $existe = CafeteriaDetalleReserva::where('Cafeteria_reserva_id', $Cafeteria->id)->exists();
        if ($existe) {
            return back()->with('message', 'No se puede eliminar la reserva')->with('typealert', 'danger');
        }
        ///ELIMINAR RESERVA CAFETERIA
        $Cafeteria->delete();
        return redirect()->route('cafeteria_index')->with('message', 'Eliminado con éxito')->with('typealert', 'success');
    }
    public function reporte(ReservaCafeteria $cafeteria)
    {
        $pdf =  PDF::loadview('cafeteria.reporte', ['cafeteria' => $cafeteria])->setPaper('letter', 'portrait');
        return $pdf->stream('reporte.pdf');
    }
}
