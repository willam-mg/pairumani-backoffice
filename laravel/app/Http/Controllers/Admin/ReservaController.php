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
use App\View\Components\Socket;
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
        $reserva->estado = 'Reservado';
        $reserva->save();
        //cambio de estado de la habitaci??n
        $habitacion->estado = 'Reservado';
        $habitacion->save();
        Socket::emmit();
        return redirect()->route('reservas_index',[$categoria->id,$habitacion->id])->with('message', 'Guardado con ??xito')->with('typealert', 'success');
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
        return redirect()->route('reservas_index',[$categoria->id,$habitacion->id])->with('message', 'Modificado con ??xito')->with('typealert', 'success');
    }
    public function destroy(HabitacionCategoria $categoria, Habitacion $habitacion,Reserva $reserva)
    {
        //cambio de estado de la habitaci??n
        $habitacion->estado = 'Disponible';
        $habitacion->save();
        $reserva->delete();
        return redirect()->route('reservas_index',[$categoria->id,$habitacion->id])->with('message', 'Eliminado con ??xito')->with('typealert', 'success');
    }
    public function hospedaje(HabitacionCategoria $categoria, Habitacion $habitacion, Reserva $reserva)
    {
        return view('reservas.hospedaje', [
            'categoria' => $categoria,
            'habitacion' => $habitacion,
            'reserva' => $reserva,
            'tipo' => Reserva::TIPO,
            'acompa??antes' => $reserva->cliente->acompa??antes,
        ]);
    }
    public function hospedajestore(HabitacionCategoria $categoria, Habitacion $habitacion, Reserva $reserva)
    {
        $hospedaje = new Hospedaje();
        $hospedaje->cliente_id = $reserva->cliente_id;
        $hospedaje->fecha_checkin = $reserva->checkin;
        $hospedaje->fecha_checkout = $reserva->checkout;
        $hospedaje->ni??os = $reserva->ni??os;
        $hospedaje->adultos = $reserva->adultos;
        $hospedaje->precio = $habitacion->precio;
        $hospedaje->precio_promocion = $habitacion->promocion ? $habitacion->promocion->precio : NULL;
        $hospedaje->habitacion_id = $reserva->habitacion_id;
        $hospedaje->estado = 'Ocupado';
        $hospedaje->save();
        //cambio de estado de la reserva
        $reserva->estado = 'Activo';
        $reserva->save();
        //cambio de estado de la habitaci??n
        $habitacion->estado = 'Ocupado';
        $habitacion->save();
        //registramos los acompa??antes del cliente que se hospedara
        foreach ($reserva->cliente->acompa??antes as $acompa??ante) {
            $detalle = new HospedajeDetalleAcompanante();
            $detalle->hospedaje_id = $hospedaje->id;
            $detalle->nombre = $acompa??ante->nombre;
            $detalle->num_documento = $acompa??ante->num_documento;
            $detalle->nacionalidad = $acompa??ante->nacionalidad;
            $detalle->ciudad = $acompa??ante->ciudad;
            $detalle->save();
        }

        return redirect()->route('hospedajes_index')->with('message', 'Guardado con ??xito')->with('typealert', 'success');
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