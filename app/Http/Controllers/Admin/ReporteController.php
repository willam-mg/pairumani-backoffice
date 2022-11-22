<?php

namespace App\Http\Controllers\Admin;

use App\Models\Hospedaje;
use Illuminate\Http\Request;
use App\Models\ReservaRestaurante;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\HospedajeDetalleTransporte;
use App\Models\ReservaLugarTuristico;

class ReporteController extends Controller
{
    public function ingresoshospedajes(Request $request)
    {
        $fecha_inicio = $request->get('fecha_inicio') ? $request->get('fecha_inicio') : date('Y-m-d');
        $fecha_fin = $request->get('fecha_fin') ? $request->get('fecha_fin') : date('Y-m-d');

        if($request->isMethod('post')){
            $fecha_inicio = $request->post('fecha_inicio');
            $fecha_fin = $request->post('fecha_fin');
        }

        $hospedajes = Hospedaje::where('fecha_checkin', '>=',$fecha_inicio)
            ->where('fecha_checkout', '<=',$fecha_fin)
            ->orderBy('id','desc')
            ->paginate(15)
            ->appends(['fecha_inicio' => $request->get('fecha_inicio'), 'fecha_fin' => $request->get('fecha_fin')]);

        return view('reportes.ingresoshospedajes',compact('hospedajes','fecha_inicio','fecha_fin'));
    }
    public function reporteingresoshospedajes($fecha_inicio,$fecha_fin)
    {
        $hospedajes = Hospedaje::where('fecha_checkin', '>=', $fecha_inicio)
            ->where('fecha_checkout', '<=', $fecha_fin)
            ->orderBy('id', 'desc')
            ->get();

        $pdf =  PDF::loadview('reportes.reporteingresoshospedajes', compact('hospedajes'))->setPaper('letter', 'portrait');
        return $pdf->stream('reportehospedajes.pdf');
    }
    public function ingresosrestaurante(Request $request)
    {
        $fecha_inicio = $request->get('fecha_inicio') ? $request->get('fecha_inicio') : date('Y-m-d');
        $fecha_fin = $request->get('fecha_fin') ? $request->get('fecha_fin') : date('Y-m-d');

        if ($request->isMethod('post')) {
            $fecha_inicio = $request->post('fecha_inicio');
            $fecha_fin = $request->post('fecha_fin');
        }
        
        $restaurantes = ReservaRestaurante::join('hospedajes as h','reservas_restaurante.hospedaje_id','h.id')
            ->join('restaurante_detalle_reserva as rd', 'rd.restaurante_reserva_id', 'reservas_restaurante.id')
            ->join('restaurante_detalle_reserva_productos as rdp', 'rdp.restaurante_detalle_reserva_id','rd.id')
            ->join('restaurante_productos as rp', 'rd.restaurante_producto_id','rp.id')
            ->join('restaurante_producto_opciones as rpo', 'rpo.restaurante_producto_id','rp.id')
            ->join('restaurante_producto_tamanho as rpt', 'rpt.restaurante_producto_id','rp.id')
            ->join('clientes as c', 'h.cliente_id','c.id')
            ->join('habitaciones as hb', 'h.habitacion_id', 'hb.id')
            ->select('reservas_restaurante.fecha', 'reservas_restaurante.total', 'rp.nombre as producto', DB::raw('CONCAT(c.nombres," ",c.apellidos) as cliente'), 'hb.nombre as habitacion', 'rd.precio', 'rd.cantidad', 'rdp.precio_tamanho', 'rpt.nombre as tamaño', 'rpo.nombre as opcion')
            ->where('reservas_restaurante.fecha','>=',$fecha_inicio)
            ->where('reservas_restaurante.fecha','<=',$fecha_fin)
            ->orderBy('reservas_restaurante.id')
            ->paginate(15)
            ->appends(['fecha_inicio' => $request->get('fecha_inicio'), 'fecha_fin' => $request->get('fecha_fin')]);
        return view('reportes.ingresosrestaurante', compact('restaurantes', 'fecha_inicio', 'fecha_fin'));
    }
    public function reporteingresosrestaurante($fecha_inicio, $fecha_fin)
    {
        $restaurantes = ReservaRestaurante::join('hospedajes as h', 'reservas_restaurante.hospedaje_id', 'h.id')
            ->join('restaurante_detalle_reserva as rd', 'rd.restaurante_reserva_id', 'reservas_restaurante.id')
            ->join('restaurante_detalle_reserva_productos as rdp', 'rdp.restaurante_detalle_reserva_id', 'rd.id')
            ->join('restaurante_productos as rp', 'rd.restaurante_producto_id', 'rp.id')
            ->join('restaurante_producto_opciones as rpo', 'rpo.restaurante_producto_id', 'rp.id')
            ->join('restaurante_producto_tamanho as rpt', 'rpt.restaurante_producto_id', 'rp.id')
            ->join('clientes as c', 'h.cliente_id', 'c.id')
            ->join('habitaciones as hb', 'h.habitacion_id', 'hb.id')
            ->select('reservas_restaurante.fecha', 'reservas_restaurante.total', 'rp.nombre as producto', DB::raw('CONCAT(c.nombres," ",c.apellidos) as cliente'), 'hb.nombre as habitacion', 'rd.precio', 'rd.cantidad', 'rdp.precio_tamanho', 'rpt.nombre as tamaño', 'rpo.nombre as opcion')
            ->where('reservas_restaurante.fecha', '>=', $fecha_inicio)
            ->where('reservas_restaurante.fecha', '<=', $fecha_fin)
            ->orderBy('reservas_restaurante.id')
            ->get();

        $pdf =  PDF::loadview('reportes.reporteingresosrestaurante', compact('restaurantes'))->setPaper('letter', 'portrait');
        return $pdf->stream('reporterestaurante.pdf');
    }
    public function ingresoslugarturistico(Request $request)
    {
        $fecha_inicio = $request->get('fecha_inicio') ? $request->get('fecha_inicio') : date('Y-m-d');
        $fecha_fin = $request->get('fecha_fin') ? $request->get('fecha_fin') : date('Y-m-d');

        if ($request->isMethod('post')) {
            $fecha_inicio = $request->post('fecha_inicio');
            $fecha_fin = $request->post('fecha_fin');
        }
        
        $lugares = ReservaLugarTuristico::where('fecha','>=',$fecha_inicio)
            ->where('fecha','<=',$fecha_fin)
            ->orderBy('id')
            ->paginate(15)
            ->appends(['fecha_inicio' => $request->get('fecha_inicio'), 'fecha_fin' => $request->get('fecha_fin')]);
        return view('reportes.ingresoslugaresturisticos', compact('lugares', 'fecha_inicio', 'fecha_fin'));
    }
    public function reporteingresoslugarturistico($fecha_inicio, $fecha_fin)
    {
        $lugares = ReservaLugarTuristico::where('fecha', '>=', $fecha_inicio)
            ->where('fecha', '<=', $fecha_fin)
            ->orderBy('id')
            ->get();

        $pdf =  PDF::loadview('reportes.reporteingresoslugaresturisticos', compact('lugares'))->setPaper('letter', 'portrait');
        return $pdf->stream('reporterestaurante.pdf');
    }
    public function ingresostransportes(Request $request)
    {
        $fecha_inicio = $request->get('fecha_inicio') ? $request->get('fecha_inicio') : date('Y-m-d');
        $fecha_fin = $request->get('fecha_fin') ? $request->get('fecha_fin') : date('Y-m-d');

        if ($request->isMethod('post')) {
            $fecha_inicio = $request->post('fecha_inicio');
            $fecha_fin = $request->post('fecha_fin');
        }
        
        $transportes = HospedajeDetalleTransporte::where('fecha','>=',$fecha_inicio)
            ->where('fecha','<=',$fecha_fin)
            ->orderBy('id')
            ->paginate(15)
            ->appends(['fecha_inicio' => $request->get('fecha_inicio'), 'fecha_fin' => $request->get('fecha_fin')]);
        return view('reportes.ingresostransportes', compact('transportes', 'fecha_inicio', 'fecha_fin'));
    }
    public function reporteingresostransportes($fecha_inicio, $fecha_fin)
    {
        $transportes = HospedajeDetalleTransporte::where('fecha', '>=', $fecha_inicio)
            ->where('fecha', '<=', $fecha_fin)
            ->orderBy('id')
            ->get();

        $pdf =  PDF::loadview('reportes.reporteingresostransportes', compact('transportes'))->setPaper('letter', 'portrait');
        return $pdf->stream('reporterestaurante.pdf');
    }
}