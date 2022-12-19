<?php

namespace App\Http\Controllers\Admin;

use App\Models\Cliente;
use App\Models\Reserva;
use App\Models\Hospedaje;
use App\Models\Habitacion;
use App\Models\Acompanante;
use Illuminate\Http\Request;
use App\Models\HabitacionCategoria;
use App\Http\Controllers\Controller;
use App\Models\HospedajeAcompanante;
use App\Http\Requests\ReservaFormRequest;
use App\Models\HospedajeDetalleAcompanante;
use App\Traits\Socket;
class ReservaController extends Controller
{
    use Socket;

    public function index(Request $request,Habitacion $habitacion)
    {
        if ($request) {
            $query = trim($request->get('searchText'));
            $reservas = Reserva::join('habitaciones','reservas.habitacion_id','habitaciones.id')
                ->select('reservas.*','habitaciones.num_habitacion')
                ->where('reservas.habitacion_id',$habitacion->id)
                ->where('habitaciones.num_habitacion', 'LIKE', '%' . $query . '%')
                ->orderBy('reservas.id', 'desc')
                ->paginate(7);
            return view('reservas.index', ['reservas' => $reservas,'habitacion' =>$habitacion,'searchText' => $query]);
        }
    }
    public function show(HabitacionCategoria $categoria, Habitacion $habitacion,Reserva $reserva)
    {
        return view('reservas.show', compact('reserva','categoria','habitacion'));
    }
    public function create(Habitacion $habitacion,$cliente=null)
    {
        $reserva = new Reserva();
        $reserva->cliente_id = $cliente;
        return view('reservas.create', [
            'tipo' => Reserva::TIPO,
            'habitacion' => $habitacion,
            'reserva' => $reserva,
            'clientes' => Cliente::get()->pluck('nombre_completo','id'),
        ]);
    }
    public function store(ReservaFormRequest $request, Habitacion $habitacion)
    {
        if($habitacion->estado == 'Ocupado'){
            return redirect()->back()->with('message','La habitacion ya fue ocupada')->with('typealert','danger');
        }
        $reserva = (new Reserva())->fill($request->all());
        $reserva->habitacion_id = $habitacion->id;
        $reserva->estado = 'Reservado';
        $reserva->save();
        //cambio de estado de la habitación
        $habitacion->estado = 'Reservado';
        $habitacion->save();
        $this->emmit();
        return redirect()->route('reservas_index',[$habitacion->id])->with('message', 'Guardado con éxito')->with('typealert', 'success');
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
        return redirect()->route('reservas_index',[$habitacion->id])->with('message', 'Modificado con éxito')->with('typealert', 'success');
    }
    public function destroy(HabitacionCategoria $categoria, Habitacion $habitacion,Reserva $reserva)
    {
        //cambio de estado de la habitación
        $habitacion->estado = 'Disponible';
        $habitacion->save();
        $reserva->delete();
        return redirect()->route('reservas_index',[$habitacion->id])->with('message', 'Eliminado con éxito')->with('typealert', 'success');
    }
    public function hospedaje(HabitacionCategoria $categoria, Habitacion $habitacion, Reserva $reserva)
    {
        return view('reservas.hospedaje', [
            'categoria' => $categoria,
            'habitacion' => $habitacion,
            'reserva' => $reserva,
            'tipo' => Reserva::TIPO,
            'acompañantes' => $reserva->cliente->acompañantes,
        ]);
    }
    public function hospedajestore(Habitacion $habitacion, Reserva $reserva)
    {
        $hospedaje = new Hospedaje();
        $hospedaje->cliente_id = $reserva->cliente_id;
        $hospedaje->fecha_checkin = $reserva->checkin;
        $hospedaje->fecha_checkout = $reserva->checkout;
        $hospedaje->niños = $reserva->niños;
        $hospedaje->adultos = $reserva->adultos;
        $hospedaje->precio = $habitacion->precio;
        $hospedaje->precio_promocion = $habitacion->promocion ? $habitacion->promocion->precio : NULL;
        $hospedaje->habitacion_id = $reserva->habitacion_id;
        $hospedaje->estado = 'Ocupado';
        $hospedaje->save();
        //cambio de estado de la reserva
        $reserva->estado = 'Activo';
        $reserva->save();
        //cambio de estado de la habitación
        $habitacion->estado = 'Ocupado';
        $habitacion->save();
        //registramos los acompañantes del cliente que se hospedara
        foreach ($reserva->cliente->acompañantes as $acompañante) {
            $detalle = new HospedajeDetalleAcompanante();
            $detalle->hospedaje_id = $hospedaje->id;
            $detalle->nombre = $acompañante->nombre;
            $detalle->num_documento = $acompañante->num_documento;
            $detalle->nacionalidad = $acompañante->nacionalidad;
            $detalle->ciudad = $acompañante->ciudad;
            $detalle->save();
        }

        return redirect()->route('hospedajes_index')->with('message', 'Guardado con éxito')->with('typealert', 'success');
    }

    public function todas(Request $request)
    {
        if ($request) {
            $query = trim($request->get('searchText'));
            $reservas = Reserva::orderBy('id', 'desc')
                ->where('estado', 'Reservado')
                ->paginate(7);
            return view('reservas.todos', ['reservas' => $reservas,'searchText' => $query]);
        }
    }
}