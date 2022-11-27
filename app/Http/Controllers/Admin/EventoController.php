<?php

namespace App\Http\Controllers\Admin;

use App\Models\Evento;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\EventoFormRequest;
use App\Models\GaleriaEvento;

class EventoController extends Controller
{
    public function index(Request $request)
    {
        if ($request) {
            $query = trim($request->get('searchText'));
            $eventos = Evento::where('nombre', 'LIKE', '%' . $query . '%')
                ->orderBy('id', 'desc')
                ->paginate(7);
            return view('eventos.index', ["eventos" => $eventos, "searchText" => $query]);
        }
    }
    public function show(Evento $evento)
    {
        return view('eventos.show',compact('evento'));
    }
    public function create()
    {
        return view('eventos.create', [
            'evento' => new Evento()
        ]);
    }
    public function store(EventoFormRequest $request)
    {
        $evento = (new Evento())->fill($request->all());
        $evento->foto = crearimagen($request->hasFile('foto'), $request->file('foto'), Evento::Namefoto(), Evento::Rutafoto());
        $evento->save();
        return redirect()->route('eventos_index')->with('message', 'Guardado con éxito')->with('typealert', 'success');
    }
    public function edit(Evento $evento)
    {
        return view('eventos.edit', compact('evento'));
    }
    public function update(EventoFormRequest $request, Evento $evento)
    {
        $evento->foto = editarimagen($request->hasFile('foto'), $request->file('foto'), Evento::Namefoto(), Evento::Rutafoto(), $evento->foto, Evento::Urldeletefoto());
        $evento->update($request->except('foto'));
        return redirect()->route('eventos_index')->with('message', 'Modificado con éxito')->with('typealert', 'success');
    }
    public function fotos(Evento $evento)
    {
        return view('eventos.fotos',[
            'evento' => $evento
        ]);
    }
    public function fotosstore(Evento $evento)
    {
        $this->validate(request(), [
            'foto' => 'required|mimes:jpeg,png,jpg,gif,svg|max:3072'
        ]);

        $galeria = new GaleriaEvento();
        $galeria->save();
        $galeria->foto = crearimagen(request()->hasFile('foto'), request()->file('foto'), GaleriaEvento::Name($evento->id, $galeria->id), GaleriaEvento::Ruta());
        $galeria->evento_id = $evento->id;
        $galeria->save();

        return redirect()->back()->with('message', 'Foto subida')->with('typealert', 'success');
    }
    public function fotosdelete(Evento $evento,GaleriaEvento $galeria)
    {
        eliminarimagen($galeria->foto, GaleriaEvento::Ruta(), GaleriaEvento::Urldelete());
        $galeria->delete();
        return redirect()->back()->with('message', 'Foto eliminada')->with('typealert', 'success');
    }
    public function destroy(Evento $evento)
    {
        $existe = GaleriaEvento::where('evento_id', $evento->id)->exists();
        if ($existe) {
            return back()->with('message', 'No se puede eliminar el evento')->with('typealert', 'danger');
        }
        ///ELIMINAR FOTO
        eliminarimagen($evento->foto, Evento::Rutafoto(), Evento::Urldeletefoto());
        $evento->delete();
        return redirect()->route('eventos_index')->with('message', 'Eliminado con éxito')->with('typealert', 'success');
    }
}
