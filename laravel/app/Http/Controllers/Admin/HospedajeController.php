<?php

namespace App\Http\Controllers\Admin;

use App\Models\Cliente;
use App\Models\Hospedaje;
use App\Models\Habitacion;
use App\Models\Acompanante;
use Illuminate\Http\Request;
use App\Models\HospedajeDetalleAcompanante;
use App\Http\Controllers\Controller;
use App\Http\Requests\HospedajeFormRequest;
use App\Models\HospedajeDetalleTransporte;
use App\Models\Transporte;

class HospedajeController extends Controller
{
    public function index(Request $request)
    {
        if ($request) {
            $query = trim($request->get('searchText'));
            $hospedajes = Hospedaje::join('clientes','hospedajes.cliente_id','clientes.id')
                ->join('habitaciones','hospedajes.habitacion_id','habitaciones.id')
                ->select('hospedajes.*')
                ->where('clientes.nombres', 'LIKE', '%' . $query . '%')
                ->orwhere('clientes.apellidos', 'LIKE', '%' . $query . '%')
                ->orwhere('habitaciones.nombre', 'LIKE', '%' . $query . '%')
                ->orwhere('habitaciones.num_habitacion', 'LIKE', '%' . $query . '%')
                ->orwhere('clientes.celular', 'LIKE', '%' . $query . '%')
                ->orderBy('hospedajes.id', 'desc')
                ->paginate(7);
            return view('hospedajes.index', ["hospedajes" => $hospedajes, "searchText" => $query]);
        }
    }
    public function show(Hospedaje $hospedaje)
    {
        return view('hospedajes.show', compact('hospedaje'));
    }
    public function create($cliente=null,$acompanante=null)
    {
        $hospedaje = new Hospedaje();
        $detalle = new HospedajeDetalleAcompanante();
        $hospedaje->cliente_id = $cliente;
        $detalle->acompanante_id = $acompanante;
        return view('hospedajes.create', [
            'hospedaje' => $hospedaje,
            'detalle' => $detalle,
            'clientes' => Cliente::get()->pluck('nombre_completo','id'),
            'habitaciones' => Habitacion::pluck('nombre','id'),
            'acompañantes' => Acompanante::pluck('nombre', 'id'),
            'tipo' => Hospedaje::TIPO,
            'detalles' => $hospedaje->detalleacompanantes,
        ]);
    }
    public function store(HospedajeFormRequest $request)
    {
        $hospedaje = (new Hospedaje())->fill($request->all());
        $hospedaje->save();
        //cambio de estado de la habitación
        $habitacion = Habitacion::find($hospedaje->habitacion_id);
        $habitacion->estado = 'Ocupado';
        $habitacion->save();
        //registro de los acompañantes
        $acompañante_id = request()->get('acompañante_id');
        $cont = 0;

        if ($acompañante_id != null) {
            while ($cont < count($acompañante_id)) {
                $detalle = new HospedajeDetalleAcompanante();
                $detalle->hospedaje_id = $hospedaje->id;
                $detalle->acompanante_id = $acompañante_id[$cont];
                $detalle->save();
                $cont = $cont + 1;
            }
        }
        return redirect()->route('hospedajes_index')->with('message', 'Guardado con éxito')->with('typealert', 'success');
    }
    public function edit(Hospedaje $hospedaje,$acompanante = null)
    {
        $detalle = new HospedajeDetalleAcompanante();
        $detalle->acompanante_id = $acompanante;
        return view('hospedajes.edit', [
            'clientes' => Cliente::get()->pluck('nombre_completo', 'id'),
            'habitaciones' => Habitacion::pluck('nombre', 'id'),
            'acompañantes' => Acompanante::pluck('nombre', 'id'),
            'hospedaje' => $hospedaje,
            'acompanante' => $acompanante,
            'detalle' => $detalle,
            'detalles' => $hospedaje->detalleacompanantes,
            'tipo' => Hospedaje::TIPO,
        ]);
    }
    public function update(HospedajeFormRequest $request, Hospedaje $hospedaje)
    {
        $hospedaje->update($request->all());
        //registro de los acompañantes
        $acompañante_id = request()->get('acompañante_id');
        $cont = 0;

        if ($acompañante_id != null) {
            while ($cont < count($acompañante_id)) {
                $detalle = new HospedajeDetalleAcompanante();
                $existe = HospedajeDetalleAcompanante::where('acompanante_id',$acompañante_id[$cont])->where('hospedaje_id',$hospedaje->id)->exists();
                if($existe){
                    return redirect()->back()->with('message', 'El acompañante ya esta registrado')->with('typealert', 'danger');
                }
                $detalle->hospedaje_id = $hospedaje->id;
                $detalle->acompanante_id = $acompañante_id[$cont];
                $detalle->save();
                $cont = $cont + 1;
            }
        }
        return redirect()->route('hospedajes_index')->with('message', 'Modificado con éxito')->with('typealert', 'success');
    }
    public function acompanantedestroy(Hospedaje $hospedaje,HospedajeDetalleAcompanante $detalle,Acompanante $acompanante)
    {
        $eliminar = HospedajeDetalleAcompanante::where('id',$detalle->id)->where('hospedaje_id',$hospedaje->id)->where('acompanante_id',$acompanante->id)->first();
        $eliminar->delete();
        return redirect()->back()->with('message', 'Eliminado con éxito')->with('typealert', 'success');
    }
    public function destroy(Hospedaje $hospedaje)
    {
        $habitacion = Habitacion::FindOrFail($hospedaje->habitacion_id);
        $habitacion->estado = 'Disponible';
        $habitacion->sace();
        $hospedaje->delete();
        return redirect()->route('hospedajes_index')->with('message', 'Eliminado con éxito')->with('typealert', 'success');
    }
    public function transporte(Hospedaje $hospedaje)
    {
        return view('hospedajes.transporte',[
            'hospedaje' => $hospedaje,
            'detalle' => new HospedajeDetalleTransporte(),
            'transportes' => Transporte::all(),
            'detalles' => $hospedaje->detalletransportes,
        ]);
    }
    public function transportestore(Hospedaje $hospedaje)
    {
        //registro de los acompañantes
        $transporte_id = request()->get('transporte_id');
        $precio = request()->get('precio');
        $cont = 0;

        while ($cont < count($transporte_id)) {
            $detalle = new HospedajeDetalleTransporte();
            $existe = HospedajeDetalleTransporte::where('transporte_id',$transporte_id[$cont])->where('hospedaje_id',$hospedaje->id)->exists();
            if($existe){
                return redirect()->back()->with('message', 'El transporte ya esta registrado')->with('typealert', 'danger');
            }
            $detalle->hospedaje_id = $hospedaje->id;
            $detalle->transporte_id = $transporte_id[$cont];
            $detalle->precio = $precio[$cont];
            $detalle->save();
            $cont = $cont + 1;
        }

        return redirect()->back()->with('message', 'Guardado con éxito')->with('typealert', 'success');
    }
    public function transportesdestroy(Hospedaje $hospedaje,HospedajeDetalleTransporte $detalle,Transporte $transporte)
    {
        $eliminar = HospedajeDetalleTransporte::where('id', $detalle->id)->where('hospedaje_id', $hospedaje->id)->where('transporte_id', $transporte->id)->first();
        $eliminar->delete();
        return redirect()->back()->with('message', 'Eliminado con éxito')->with('typealert', 'success');
    }
}
