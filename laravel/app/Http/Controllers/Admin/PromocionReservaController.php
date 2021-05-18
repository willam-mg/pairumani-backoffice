<?php

namespace App\Http\Controllers\Admin;

use App\Models\Cliente;
use App\Models\Hospedaje;
use App\Models\Promocion;
use App\Models\Acompanante;
use Illuminate\Http\Request;
use App\Models\ReservaPromocion;
use App\Http\Controllers\Controller;
use App\Http\Requests\PromocionReservaFormRequest;
use App\Models\HospedajeDetalleAcompanante;

class PromocionReservaController extends Controller
{
    public function index(Request $request, Promocion $promocion)
    {
        if ($request) {
            $query = trim($request->get('searchText'));
            $reservas = ReservaPromocion::join('habitaciones', 'reservas_promocion.habitacion_id', 'habitaciones.id')
            ->join('clientes','reservas_promocion.cliente_id','clientes.id')
            ->select('reservas_promocion.*')
            ->where('reservas_promocion.promocion_id', $promocion->id)
            ->orwhere('habitaciones.num_habitacion', 'LIKE', '%' . $query . '%')
            ->where('reservas_promocion.promocion_id', $promocion->id)
            ->orwhere('clientes.nombres', 'LIKE', '%' . $query . '%')
            ->where('reservas_promocion.promocion_id', $promocion->id)
            ->orwhere('clientes.apellidos', 'LIKE', '%' . $query . '%')
            ->orderBy('reservas_promocion.id', 'desc')
            ->paginate(7);
            return view('reservaspromocion.index', ['reservas' => $reservas, 'promocion' => $promocion, 'searchText' => $query]);
        }
    }
    public function show(ReservaPromocion $reserva)
    {
        return view('reservaspromocion.show', compact('reserva'));
    }
    public function hospedaje(Promocion $promocion, ReservaPromocion $reserva, $acompanante = null)
    {
        $hospedaje = new HospedajeDetalleAcompanante();
        $hospedaje->acompanante_id = $acompanante;
        return view('reservas.hospedaje', [
            'promocion' => $promocion,
            'reserva' => $reserva,
            'tipo' => ReservaPromocion::TIPO,
            'hospedaje' => $hospedaje,
            'acompañantes' => Acompanante::pluck('nombre', 'id'),
        ]);
    }
    public function hospedajestore(ReservaPromocion $reserva, $acompanante = null)
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
        $hospedaje->save();
        //cambio de estado de la habitación
        $reserva->habitacion->estado = 'Ocupado';
        $reserva->habitacion->save();
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
        if ($promocion->habitacion->estado == 'Ocupado') {
            return redirect()->back()->with('message', 'La habitacion ya fue ocupada')->with('typealert', 'danger');
        }
        $reserva = (new ReservaPromocion())->fill($request->all());
        $reserva->habitacion_id = $promocion->habitacion_id;
        $reserva->promocion_id = $promocion->id;
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
        $reserva->delete();
        return redirect()->route('reservas_index', $promocion->id)->with('message', 'Eliminado con éxito')->with('typealert', 'success');
    }
}
