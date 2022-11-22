<?php

namespace App\Http\Controllers\Admin;

use App\Models\Cliente;
use App\Models\Hospedaje;
use App\Models\Promocion;
use App\Models\Habitacion;
use App\Models\Acompanante;
use Illuminate\Http\Request;
use App\Models\ReservaPromocion;
use App\Http\Controllers\Controller;
use App\Models\HospedajeDetalleAcompanante;
use App\Http\Requests\PromocionReservaFormRequest;

class PromocionReservaController extends Controller
{
    public function index(Request $request, Promocion $promocion)
    {
        if($promocion->estado == 'Inactivo'){
            return redirect()->route('promociones_index')->with('message', 'La promocion esta inactiva')->with('typealert', 'danger');
        }
        if ($request) {
            $query = trim($request->get('searchText'));
            $reservas = ReservaPromocion::join('clientes','reservas_promocion.cliente_id','clientes.id')
            ->select('reservas_promocion.*')
            ->where('clientes.nombres', 'LIKE', '%' . $query . '%')
            ->where('reservas_promocion.promocion_id', $promocion->id)
            ->orwhere('clientes.apellidos', 'LIKE', '%' . $query . '%')
            ->where('reservas_promocion.promocion_id', $promocion->id)
            ->orderBy('reservas_promocion.id', 'desc')
            ->paginate(7);
            return view('reservaspromocion.index', ['reservas' => $reservas, 'promocion' => $promocion, 'searchText' => $query]);
        }
    }
    public function show(Promocion $promocion,ReservaPromocion $reserva)
    {
        return view('reservaspromocion.show', compact('promocion','reserva'));
    }
    public function create(Promocion $promocion, $cliente = null)
    {
        $reserva = new ReservaPromocion();
        $reserva->cliente_id = $cliente;
        return view('reservaspromocion.create', [
            'tipo' => ReservaPromocion::TIPO,
            'reserva' => $reserva,
            'promocion' => $promocion,
            'clientes' => Cliente::get()->pluck('nombre_completo', 'id'),
        ]);
    }
    public function store(PromocionReservaFormRequest $request, Promocion $promocion)
    {
        if($promocion->habitacion->estado == 'Reservado' || $promocion->habitacion->estado == 'Ocupado') {
            return redirect()->back()->with('message', 'La habitacion ya fue ocupada')->with('typealert', 'danger');
        }
        if($promocion->habitacion->estado == 'Limpieza') {
            return redirect()->back()->with('message', 'La habitacion se encuentra en limpieza')->with('typealert', 'danger');
        }
        $reserva = (new ReservaPromocion())->fill($request->all());
        $reserva->habitacion_id = $promocion->habitacion_id;
        $reserva->promocion_id = $promocion->id;
        $reserva->estado = 'Reservado';
        $reserva->save();
        //cambio de estado de la habitación
        $reserva->habitacion->estado = 'Reservado';
        $reserva->habitacion->save();
        return redirect()->route('promocionreservas_index', $promocion->id)->with('message', 'Guardado con éxito')->with('typealert', 'success');
    }
    public function edit(Promocion $promocion,ReservaPromocion $reserva)
    {
        return view('reservaspromocion.edit', [
            'promocion' => $promocion,
            'reserva' => $reserva,
            'tipo' => null,
            'clientes' => Cliente::get()->pluck('nombre_completo', 'id'),
        ]);
    }
    public function update(PromocionReservaFormRequest $request, Promocion $promocion, ReservaPromocion $reserva)
    {
        $reserva->update($request->all());
        return redirect()->route('promocionreservas_index', $promocion->id)->with('message', 'Modificado con éxito')->with('typealert', 'success');
    }
    public function destroy(Promocion $promocion, ReservaPromocion $reserva)
    {
        //cambio de estado de la habitación
        $reserva->habitacion->estado = 'Disponible';
        $reserva->habitacion->save();
        $reserva->delete();
        return redirect()->route('promocionreservas_index', $promocion->id)->with('message', 'Eliminado con éxito')->with('typealert', 'success');
    }
    public function hospedaje(Promocion $promocion, ReservaPromocion $reserva, $acompanante = null)
    {
        return view('reservaspromocion.hospedaje', [
            'promocion' => $promocion,
            'reserva' => $reserva,
            'tipo' => ReservaPromocion::TIPO,
        ]);
    }
    public function hospedajestore(Promocion $promocion, ReservaPromocion $reserva, $acompanante = null)
    {
        if ($reserva->habitacion->estado == 'Ocupado' && $reserva->habitacion->estado == 'Reservado') {
            return redirect()->back()->with('message', 'La habitacion ya fue ocupada')->with('typealert', 'danger');
        }
        $hospedaje = new Hospedaje();
        $hospedaje->cliente_id = $reserva->cliente_id;
        $hospedaje->fecha_checkin = $reserva->checkin;
        $hospedaje->fecha_checkout = $reserva->checkout;
        $hospedaje->habitacion_id = $reserva->habitacion_id;
        $hospedaje->niños = $reserva->niños;
        $hospedaje->adultos = $reserva->adultos;
        $hospedaje->precio = $reserva->habitacion->precio;
        $hospedaje->precio_promocion = $reserva->habitacion->promocion ? $reserva->habitacion->promocion->precio : NULL;
        $hospedaje->estado = 'Ocupado';
        $hospedaje->save();
        //cambio de estado de la reserva
        $reserva->estado = 'Activo';
        $reserva->save();
        //cambio de estado de la habitación
        $habitacion = Habitacion::find($reserva->habitacion_id);
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
    public function acompanante($id)
    {
        $acompañantes = Acompanante::where('cliente_id',$id)->get();
        return response(json_encode($acompañantes),200)->header('Content-type','text/plain');
    }
}
