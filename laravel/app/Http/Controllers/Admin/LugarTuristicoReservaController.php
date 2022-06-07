<?php

namespace App\Http\Controllers\Admin;

use App\Models\Cliente;
use Illuminate\Http\Request;
use App\Models\LugarTuristico;
use App\Http\Controllers\Controller;
use App\Models\ReservaLugarTuristico;
use App\Http\Requests\LugarTuristicoReservaFormRequest;
use App\Models\Hospedaje;

class LugarTuristicoReservaController extends Controller
{
    public function index(Request $request, LugarTuristico $lugar)
    {
        if ($request) {
            $query = trim($request->get('searchText'));
            $reservas = ReservaLugarTuristico::where('.lugar_turistico_id', $lugar->id)->orderBy('.id', 'desc')->paginate(7);
            return view('reservaslugarturistico.index', ['reservas' => $reservas, 'lugar' => $lugar, 'searchText' => $query]);
        }
    }
    public function show(LugarTuristico $lugar, ReservaLugarTuristico $reserva)
    {
        return view('reservaslugarturistico.show', compact('lugar', 'reserva'));
    }
    public function create(LugarTuristico $lugar, $cliente = null)
    {
        $reserva = new ReservaLugarTuristico();
        $reserva->cliente_id = $cliente;
        return view('reservaslugarturistico.create', [
            'tipo' => ReservaLugarTuristico::TIPO,
            'reserva' => $reserva,
            'lugar' => $lugar,
            'clientes' => Cliente::get()->pluck('nombre_completo', 'id'),
        ]);
    }
    public function store(LugarTuristicoReservaFormRequest $request, LugarTuristico $lugar)
    {
        $reserva = new ReservaLugarTuristico();
        $reserva->cliente_id = $request->get('cliente_id');
        $reserva->lugar_turistico_id = $lugar->id;
        $reserva->fecha = $request->get('fecha');
        $reserva->estado = 'Reservado';
        $reserva->hospedaje_id = NULL;
        $reserva->precio = $lugar->precio_recorrido;
        $reserva->save();
        return redirect()->route('reservaslugaresturisticos_index', $lugar->id)->with('message', 'Guardado con éxito')->with('typealert', 'success');
    }
    public function edit(LugarTuristico $lugar, ReservaLugarTuristico $reserva)
    {
        return view('reservaslugarturistico.edit', [
            'lugar' => $lugar,
            'reserva' => $reserva,
            'tipo' => null,
            'clientes' => Cliente::get()->pluck('nombre_completo', 'id'),
        ]);
    }
    public function update(LugarTuristicoReservaFormRequest $request,LugarTuristico $lugar, ReservaLugarTuristico $reserva)
    {
        $reserva->update($request->all());
        return redirect()->route('reservaslugaresturisticos_index', $lugar->id)->with('message', 'Modificado con éxito')->with('typealert', 'success');
    }
    public function destroy(LugarTuristico $lugar, ReservaLugarTuristico $reserva)
    {
        $reserva->delete();
        return redirect()->route('reservaslugaresturisticos_index', $lugar->id)->with('message', 'Eliminado con éxito')->with('typealert', 'success');
    }
    public function hospedaje(LugarTuristico $lugar, ReservaLugarTuristico $reserva)
    {
        $hospedaje = Hospedaje::where('cliente_id',$reserva->cliente_id)->where('estado','Ocupado')->get()->last();
        if(!$hospedaje){
            return redirect()->route('reservaslugaresturisticos_index', $lugar->id)->with('message', 'El cliente no tiene ningun hospedaje')->with('typealert', 'danger');
        }
        $reserva->hospedaje_id = $hospedaje->id;
        $reserva->estado = 'Activo';
        $reserva->save();
        return redirect()->route('reservaslugaresturisticos_index', $lugar->id)->with('message', 'Se asigno el hospedaje correctamente')->with('typealert', 'success');
    }
}