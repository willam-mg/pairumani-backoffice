<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AcompananteFormRequest;
use App\Models\Acompanante;
use App\Models\Cliente;
use App\Models\Hospedaje;
use App\Models\HospedajeDetalle;
use App\Models\Reserva;
use Illuminate\Http\Request;

class AcompananteController extends Controller
{
    public function index(Request $request)
    {
        if ($request) {
            $query = trim($request->get('searchText'));
            $acompanantes = Acompanante::where('nombre', 'LIKE', '%' . $query . '%')
                ->orwhere('tipo_documento','LIKE','%'. $query .'%')
                ->orderBy('id', 'desc')
                ->paginate(7);
            return view('acompanantes.index', ["acompanantes" => $acompanantes, "searchText" => $query]);
        }
    }
    public function show(Acompanante $acompanante)
    {
        return view('acompanantes.show',compact('acompanante'));
    }
    public function create($tipo = null,$categoria = null, $habitacion = null, $reserva = null,$hospedaje = null)
    {
        return view('acompanantes.create',[
            'acompanante' => new Acompanante(),
            'categoria' => $categoria,
            'habitacion' => $habitacion,
            'hospedaje' => $hospedaje,
            'reserva' => $reserva,
            'tipo' => $tipo,
        ]);
    }
    public function store(AcompananteFormRequest $request, $tipo = null, $categoria = null, $habitacion = null, $reserva = null, $hospedaje = null)
    {
        $acompanante = (new Acompanante())->fill($request->all());
        $acompanante->save();

        if ($tipo == Reserva::TIPO) {
            return redirect()->route('reservas_hospedaje', [$categoria, $habitacion, $reserva,$acompanante]);
        }elseif($tipo == Hospedaje::TIPO&& !$hospedaje){
            return redirect()->route('hospedajes_create',[0,$acompanante]);
        }elseif($tipo == Hospedaje::TIPO && $hospedaje){
            return redirect()->route('hospedajes_edit', [$hospedaje,$acompanante]);
        }else{
            return redirect()->route('acompanantes_index')->with('message', 'Guardado con éxito')->with('typealert', 'success');
        }
    }
    public function edit(Acompanante $acompanante)
    {
        return view('acompanantes.edit',compact('acompanante'));
    }
    public function update(AcompananteFormRequest $request, Acompanante $acompanante)
    {
        $acompanante->update($request->all());
        return redirect()->route('acompanantes_index')->with('message', 'Modificado con éxito')->with('typealert', 'success');
    }
    public function destroy(Acompanante $acompanante)
    {
        $existe = HospedajeDetalle::where('acompanante_id',$acompanante->id)->exists();
        if($existe){
            return back()->with('message', 'No se puede eliminar el acompanante')->with('typealert', 'danger');
        }
        $acompanante->delete();
        return redirect()->route('acompanantes_index')->with('message', 'Eliminado con éxito')->with('typealert', 'success');
    }
}