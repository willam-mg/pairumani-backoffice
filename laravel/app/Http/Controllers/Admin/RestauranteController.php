<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\RestauranteFormRequest;
use App\Models\Cliente;
use App\Models\ReservaRestaurante;
use App\Models\RestauranteDetalleReserva;
use App\Models\RestauranteDetalleReservaProducto;
use App\Models\RestauranteProducto;
use App\Models\RestauranteProductoOpcion;
use App\Models\RestauranteProductoTamano;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;

class RestauranteController extends Controller
{
    public function index(Request $request)
    {
        if ($request) {
            $query = trim($request->get('searchText'));
            $restaurantes = ReservaRestaurante::orderBy('id', 'desc')->paginate(7);
            return view('restaurantes.index', ["restaurantes" => $restaurantes, "searchText" => $query]);
        }
    }
    public function show(ReservaRestaurante $restaurante)
    {
        return view('restaurantes.show', compact('restaurante'));
    }
    public function create()
    {
        return view('restaurantes.create', [
            'restaurante' => new ReservaRestaurante(),
            'clientes' => Cliente::get()->pluck('nombrecompleto','id'),
            'productos' => RestauranteProducto::all(),
        ]);
    }
    public function opciones(Request $request, $id)
    {
        if($request->ajax()){
            $opcionescount = RestauranteProductoOpcion::where('restaurante_producto_id',$id)->count();
            if($opcionescount > 0){
                $opciones = RestauranteProductoOpcion::where('restaurante_producto_id',$id)->get();
            }else{
                $opciones = '';
            }
            return response()->json($opciones);
        }
    }
    public function tamanos(Request $request, $id)
    {
        if($request->ajax()){
            $tamañoscount = RestauranteProductoTamano::where('restaurante_producto_id',$id)->count();
            if($tamañoscount > 0){
                $tamaños = RestauranteProductoTamano::where('restaurante_producto_id',$id)->get();
            }else{
                $tamaños = '';
            }
            return response()->json($tamaños);
        }
    }
    public function store(RestauranteFormRequest $request)
    {
        $restaurante = new ReservaRestaurante();
        $restaurante->cliente_id = $request->get('cliente_id');
        $restaurante->fecha = date('Y-m-d');
        $restaurante->hora = date('H:i:s');
        $restaurante->total = $request->get('total_venta');
        $restaurante->save();

        //DETALLE RESERVA
        $producto_id = $request->get('producto_id');
        $cantidad = $request->get('cantidad');
        $precio = $request->get('precio');
        $opcion_id = $request->get('opcion_id');
        $tamaño_id = $request->get('tamaño_id');
        $preciotamaño = $request->get('preciotamaño');

        $cont = 0;

        while ($cont < count($producto_id)) {
            $detalle = new RestauranteDetalleReserva();
            $detalle->restaurante_reserva_id = $restaurante->id;
            $detalle->restaurante_producto_id = $producto_id[$cont];
            $detalle->precio = $precio[$cont];
            $detalle->cantidad = $cantidad[$cont];
            $detalle->save();

            $detalleproducto = new RestauranteDetalleReservaProducto();
            $detalleproducto->restaurante_detalle_reserva_id = $detalle->id;
            $detalleproducto->restaurante_producto_opciones_id = $opcion_id[$cont];
            $detalleproducto->restaurante_producto_tamanho_id = $tamaño_id[$cont];
            $detalleproducto->precio_tamanho = $preciotamaño[$cont];
            $detalleproducto->save();

            $cont = $cont + 1;
        }

        return redirect()->route('restaurantes_index')->with('message', 'Guardado con éxito')->with('typealert', 'success');
    }
    public function destroy(ReservaRestaurante $restaurante)
    {
        $existe = RestauranteDetalleReserva::where('restaurante_reserva_id', $restaurante->id)->exists();
        if ($existe) {
            return back()->with('message', 'No se puede eliminar la reserva')->with('typealert', 'danger');
        }
        ///ELIMINAR FOTO
        $restaurante->delete();
        return redirect()->route('restaurantes_index')->with('message', 'Eliminado con éxito')->with('typealert', 'success');
    }
    public function reporte(ReservaRestaurante $restaurante)
    {
        $pdf =  PDF::loadview('restaurantes.reporte', ['restaurante' => $restaurante])->setPaper('letter', 'portrait');
        return $pdf->stream('reporte.pdf');
    }
}
