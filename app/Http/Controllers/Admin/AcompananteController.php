<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\Reserva;
use App\Models\Hospedaje;
use App\Models\Acompanante;
use App\Models\ReservaPromocion;
use App\Http\Requests\AcompananteFormRequest;

class AcompananteController extends Controller
{
    public function index(Request $request,Cliente $cliente)
    {
        if ($request) {
            $query = trim($request->get('searchText'));
            $acompanantes = Acompanante::where('cliente_id',$cliente->id)
                ->where('nombre', 'LIKE', '%' . $query . '%')
                ->orwhere('tipo_documento','LIKE','%'. $query .'%')
                ->where('cliente_id', $cliente->id)
                ->orderBy('id', 'desc')
                ->paginate(7);
            return view('acompanantes.index', ["acompanantes" => $acompanantes,"cliente" => $cliente, "searchText" => $query]);
        }
    }
    public function show(Cliente $cliente, Acompanante $acompanante)
    {
        return view('acompanantes.show',compact('acompanante','cliente'));
    }
    public function create(Cliente $cliente,$tipo = null,$categoria = null, $habitacion = null, $reserva = null,$hospedaje = null,$promocion = null)
    {
        return view('acompanantes.create',[
            'tipo' => $tipo,
            'cliente' => $cliente,
            'reserva' => $reserva,
            'categoria' => $categoria,
            'hospedaje' => $hospedaje,
            'promocion' => $promocion,
            'habitacion' => $habitacion,
            'acompanante' => new Acompanante(),
        ]);
    }
    public function store(AcompananteFormRequest $request, Cliente $cliente ,$tipo = null, $categoria = null, $habitacion = null, $reserva = null, $hospedaje = null, $promocion = null)
    {
        $existe = Acompanante::where('nombre',$request->get('nombre'))->exists();
        if($existe){
            return redirect()->back()->with('message', 'Ya existe el acompañante')->with('typealert', 'danger');
        }
        $acompanante = (new Acompanante())->fill($request->all());
        $acompanante->cliente_id = $cliente->id;
        $acompanante->save();

        if ($tipo == Reserva::TIPO) {
            return redirect()->route('reservas_hospedaje', [$categoria, $habitacion, $reserva]);
        }elseif($tipo == Hospedaje::TIPO && !$hospedaje){
            return redirect()->route('hospedajes_create');
        }elseif($tipo == Hospedaje::TIPO && $hospedaje){
            return redirect()->route('hospedajes_edit', [$hospedaje]);
        }elseif($tipo == ReservaPromocion::TIPO){
            return redirect()->route('promocionreservas_hospedaje',[$promocion,$reserva]);
        }else{
            return redirect()->route('acompanantes_index',$cliente->id)->with('message', 'Guardado con éxito')->with('typealert', 'success');
        }
    }
    public function edit(Cliente $cliente, Acompanante $acompanante, $tipo = null)
    {
        return view('acompanantes.edit',compact('acompanante','cliente','tipo'));
    }
    public function update(AcompananteFormRequest $request, Cliente $cliente ,Acompanante $acompanante)
    {
        $acompanante->update($request->all());
        return redirect()->route('acompanantes_index',$cliente->id)->with('message', 'Modificado con éxito')->with('typealert', 'success');
    }
    public function destroy(Cliente $cliente, Acompanante $acompanante)
    {
        $acompanante->delete();
        return redirect()->route('acompanantes_index',$cliente->id)->with('message', 'Eliminado con éxito')->with('typealert', 'success');
    }
}