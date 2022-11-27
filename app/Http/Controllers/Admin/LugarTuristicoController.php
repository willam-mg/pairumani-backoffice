<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\LugarTuristicoFormRequest;
use App\Models\GaleriaLugarTuristico;
use App\Models\LugarTuristico;
use Illuminate\Http\Request;

class LugarTuristicoController extends Controller
{
    public function index(Request $request)
    {
        if ($request) {
            $query = trim($request->get('searchText'));
            $lugares = LugarTuristico::where('nombre', 'LIKE', '%' . $query . '%')
                ->orderBy('id', 'desc')
                ->paginate(7);
            return view('lugaresturisticos.index', ["lugares" => $lugares, "searchText" => $query]);
        }
    }
    public function show(LugarTuristico $lugar)
    {
        return view('lugaresturisticos.show', compact('lugar'));
    }
    public function create()
    {
        return view('lugaresturisticos.create', [
            'lugar' => new LugarTuristico(),
        ]);
    }
    public function store(LugarTuristicoFormRequest $request)
    {
        $lugar = (new LugarTuristico())->fill($request->all());
        $lugar->foto = crearimagen($request->hasFile('foto'), $request->file('foto'), LugarTuristico::Namefoto(), LugarTuristico::Rutafoto());
        $lugar->save();
        return redirect()->route('lugaresturisticos_index')->with('message', 'Guardado con éxito')->with('typealert', 'success');
    }
    public function edit(LugarTuristico $lugar)
    {
        return view('lugaresturisticos.edit',compact('lugar'));
    }
    public function update(LugarTuristicoFormRequest $request, LugarTuristico $lugar)
    {
        $lugar->foto = editarimagen($request->hasFile('foto'), $request->file('foto'), LugarTuristico::Namefoto(), LugarTuristico::Rutafoto(), $lugar->foto, LugarTuristico::Urldeletefoto());
        $lugar->update($request->except('foto'));
        return redirect()->route('lugaresturisticos_index')->with('message', 'Modificado con éxito')->with('typealert', 'success');
    }
    public function fotos(LugarTuristico $lugar)
    {
        return view('lugaresturisticos.fotos', [
            'lugar' => $lugar
        ]);
    }
    public function fotosstore(LugarTuristico $lugar)
    {
        $this->validate(request(), [
            'foto' => 'required|mimes:jpeg,png,jpg,gif,svg|max:3072'
        ]);

        $galeria = new GaleriaLugarTuristico();
        $galeria->save();
        $galeria->foto = crearimagen(request()->hasFile('foto'), request()->file('foto'), GaleriaLugarTuristico::Name($lugar->id, $galeria->id), GaleriaLugarTuristico::Ruta());
        $galeria->lugar_turistico_id = $lugar->id;
        $galeria->descripcion = request()->get('descripcion');
        $galeria->save();

        return redirect()->back()->with('message', 'Foto subida')->with('typealert', 'success');
    }
    public function fotosdelete(LugarTuristico $lugar, GaleriaLugarTuristico $galeria)
    {
        eliminarimagen($galeria->foto, GaleriaLugarTuristico::Ruta(), GaleriaLugarTuristico::Urldelete());
        $galeria->delete();
        return redirect()->back()->with('message', 'Foto eliminada')->with('typealert', 'success');
    }
    public function destroy(LugarTuristico $lugar)
    {
        $existe = GaleriaLugarTuristico::where('lugar_turistico_id', $lugar->id)->exists();
        if ($existe) {
            return back()->with('message', 'No se puede eliminar el lugar turistico')->with('typealert', 'danger');
        }
        ///ELIMINAR FOTO
        eliminarimagen($lugar->foto, LugarTuristico::Rutafoto(), LugarTuristico::Urldeletefoto());
        $lugar->delete();
        return redirect()->route('lugaresturisticos_index')->with('message', 'Eliminado con éxito')->with('typealert', 'success');
    }
}
