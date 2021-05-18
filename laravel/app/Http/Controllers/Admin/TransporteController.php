<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TransporteFormRequest;
use App\Models\Hospedaje;
use App\Models\Transporte;
use Illuminate\Http\Request;

class TransporteController extends Controller
{
    public function index(Request $request)
    {
        if ($request) {
            $query = trim($request->get('searchText'));
            $transportes = Transporte::where('nombre', 'LIKE', '%' . $query . '%')
                ->orderBy('id', 'desc')
                ->paginate(7);
            return view('transportes.index', ["transportes" => $transportes, "searchText" => $query]);
        }
    }
    public function show(Transporte $transporte)
    {
        return view('transportes.show', compact('transporte'));
    }
    public function create()
    {
        return view('transportes.create', [
            'transporte' => new Transporte()
        ]);
    }
    public function store(TransporteFormRequest $request)
    {
        $transporte = (new Transporte())->fill($request->all());
        $transporte->foto = crearimagen($request->hasFile('foto'), $request->file('foto'), Transporte::Namefoto(), Transporte::Rutafoto());
        $transporte->save();
        return redirect()->route('transportes_index')->with('message', 'Guardado con éxito')->with('typealert', 'success');
    }
    public function edit(Transporte $transporte)
    {
        return view('transportes.edit', compact('transporte'));
    }
    public function update(TransporteFormRequest $request, Transporte $transporte)
    {
        $transporte->foto = editarimagen($request->hasFile('foto'), $request->file('foto'), Transporte::Namefoto(), Transporte::Rutafoto(), $transporte->foto, Transporte::Urldeletefoto());
        $transporte->update($request->except('foto'));
        return redirect()->route('transportes_index')->with('message', 'Modificado con éxito')->with('typealert', 'success');
    }
    public function destroy(Transporte $transporte)
    {
        $existe = Hospedaje::where('transporte_id', $transporte->id)->exists();
        if ($existe) {
            return back()->with('message', 'No se puede eliminar el transporte')->with('typealert', 'danger');
        }
        ///ELIMINAR FOTO
        eliminarimagen($transporte->foto, Transporte::Rutafoto(), Transporte::Urldeletefoto());
        $transporte->delete();
        return redirect()->route('transportes_index')->with('message', 'Eliminado con éxito')->with('typealert', 'success');
    }
}
