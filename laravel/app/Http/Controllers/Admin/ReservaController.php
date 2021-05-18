<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ReservaFormRequest;
use App\Models\Acompanante;
use App\Models\Cliente;
use App\Models\Habitacion;
use App\Models\HabitacionCategoria;
use App\Models\Hospedaje;
use App\Models\HospedajeDetalleAcompanante;
use App\Models\Reserva;
use Illuminate\Http\Request;

class ReservaController extends Controller
{
    public function index(Request $request,HabitacionCategoria $categoria,Habitacion $habitacion)
    {
        if ($request) {
            $query = trim($request->get('searchText'));
            $reservas = Reserva::join('habitaciones','reservas.habitacion_id','habitaciones.id')
                ->select('reservas.*','habitaciones.num_habitacion')
                ->where('reservas.habitacion_id',$habitacion->id)
                ->where('habitaciones.num_habitacion', 'LIKE', '%' . $query . '%')
                ->orderBy('reservas.id', 'desc')
                ->paginate(7);
            return view('reservas.index', ['reservas' => $reservas,'categoria' => $categoria,'habitacion' =>$habitacion,'searchText' => $query]);
        }
    }
    public function show(HabitacionCategoria $categoria, Habitacion $habitacion,Reserva $reserva)
    {
        return view('reservas.show', compact('reserva','categoria','habitacion'));
    }
    public function hospedaje(HabitacionCategoria $categoria,Habitacion $habitacion,Reserva $reserva,$acompanante=null)
    {
        $hospedaje = new HospedajeDetalleAcompanante();
        $hospedaje->acompanante_id = $acompanante;
        return view('reservas.hospedaje',[
            'categoria' => $categoria,
            'habitacion' => $habitacion,
            'reserva' => $reserva,
            'tipo' => Reserva::TIPO,
            'hospedaje' => $hospedaje,
            'acompañantes' => Acompanante::pluck('nombre', 'id'),
        ]);
    }
    public function hospedajestore(HabitacionCategoria $categoria, Habitacion $habitacion, Reserva $reserva, $acompanante = null)
    {
        if ($habitacion->estado == 'Ocupado' && $habitacion->estado == 'Reservado') {
            return redirect()->back()->with('message', 'La habitacion ya fue ocupada')->with('typealert', 'danger');
        }
        $hospedaje = new Hospedaje();
        $hospedaje->cliente_id = $reserva->cliente_id;
        $hospedaje->fecha_checkin = $reserva->checkin;
        $hospedaje->fecha_checkout = $reserva->checkout;
        $hospedaje->habitacion_id = $reserva->habitacion_id;
        $hospedaje->niños = $reserva->niños;
        $hospedaje->adultos = $reserva->adultos;
        $hospedaje->precio = $habitacion->precio;
        $hospedaje->save();
        //cambio de estado de la habitación
        $habitacion->estado = 'Ocupado';
        $habitacion->save();
        //registro de los acompañantes
        $acompañante_id = request()->get('acompañante_id');
        $cont = 0;

        if($acompañante_id != null){
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
    public function create(HabitacionCategoria $categoria, Habitacion $habitacion,$cliente=null)
    {
        $reserva = new Reserva();
        $reserva->cliente_id = $cliente;
        return view('reservas.create', [
            'categoria' => $categoria,
            'tipo' => Reserva::TIPO,
            'habitacion' => $habitacion,
            'reserva' => $reserva,
            'clientes' => Cliente::get()->pluck('nombre_completo','id'),
        ]);
    }
    public function store(ReservaFormRequest $request, HabitacionCategoria $categoria,Habitacion $habitacion)
    {
        if($habitacion->estado == 'Ocupado'){
            return redirect()->back()->with('message','La habitacion ya fue ocupada')->with('typealert','danger');
        }
        $reserva = (new Reserva())->fill($request->all());
        $reserva->habitacion_id = $habitacion->id;
        $reserva->save();
        //cambio de estado de la habitación
        $habitacion->estado = 'Reservado';
        $habitacion->save();
        return redirect()->route('reservas_index',[$categoria->id,$habitacion->id])->with('message', 'Guardado con éxito')->with('typealert', 'success');
    }
    public function edit(HabitacionCategoria $categoria, Habitacion $habitacion,Reserva $reserva)
    {
        return view('reservas.edit',[
            'categoria' => $categoria,
            'habitacion' => $habitacion,
            'reserva' => $reserva,
            'tipo' => null,
            'clientes' => Cliente::get()->pluck('nombre_completo', 'id'),
        ]);
    }
    public function update(ReservaFormRequest $request, HabitacionCategoria $categoria, Habitacion $habitacion,Reserva $reserva)
    {
        $reserva->update($request->all());
        return redirect()->route('reservas_index',[$categoria->id,$habitacion->id])->with('message', 'Modificado con éxito')->with('typealert', 'success');
    }
    public function destroy(HabitacionCategoria $categoria, Habitacion $habitacion,Reserva $reserva)
    {
        $reserva->delete();
        return redirect()->route('reservas_index',[$categoria->id,$habitacion->id])->with('message', 'Eliminado con éxito')->with('typealert', 'success');
    }
}