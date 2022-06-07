<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CafeteriaCategoriaFormRequest;
use App\Models\CafeteriaCategoria;
use App\Models\CafeteriaProducto;
use Illuminate\Http\Request;

class CafeteriaCategoriaController extends Controller
{
    public function index(Request $request)
    {
        if ($request) {
            $query = trim($request->get('searchText'));
            $categorias = CafeteriaCategoria::where('nombre', 'LIKE', '%' . $query . '%')
                ->orderBy('id', 'desc')
                ->paginate(7);
            return view('cafeteriacategorias.index', ["categorias" => $categorias, "searchText" => $query]);
        }
    }
    public function show(CafeteriaCategoria $categoria)
    {
        return view('cafeteriacategorias.show', compact('categoria'));
    }
    public function create()
    {
        return view('cafeteriacategorias.create', [
            'categoria' => new CafeteriaCategoria()
        ]);
    }
    public function store(CafeteriaCategoriaFormRequest $request)
    {
        $categoria = (new CafeteriaCategoria())->fill($request->all());
        $categoria->foto = crearimagen($request->hasFile('foto'), $request->file('foto'), CafeteriaCategoria::Namefoto(), CafeteriaCategoria::Rutafoto());
        $categoria->save();
        return redirect()->route('cafeteriacategorias_index')->with('message', 'Guardado con éxito')->with('typealert', 'success');
    }
    public function edit(CafeteriaCategoria $categoria)
    {
        return view('cafeteriacategorias.edit', compact('categoria'));
    }
    public function update(CafeteriaCategoriaFormRequest $request, CafeteriaCategoria $categoria)
    {
        $categoria->foto = editarimagen($request->hasFile('foto'), $request->file('foto'), CafeteriaCategoria::Namefoto(), CafeteriaCategoria::Rutafoto(), $categoria->foto, CafeteriaCategoria::Urldeletefoto());
        $categoria->update($request->except('foto'));
        return redirect()->route('cafeteriacategorias_index')->with('message', 'Modificado con éxito')->with('typealert', 'success');
    }
    public function destroy(CafeteriaCategoria $categoria)
    {
        $existe = CafeteriaProducto::where('cafeteria_categoria_id', $categoria->id)->exists();
        if ($existe) {
            return back()->with('message', 'No se puede eliminar la categoria')->with('typealert', 'danger');
        }
        ///ELIMINAR FOTO
        eliminarimagen($categoria->foto, CafeteriaCategoria::Rutafoto(), CafeteriaCategoria::Urldeletefoto());
        $categoria->delete();
        return redirect()->route('cafeteriacategorias_index')->with('message', 'Eliminado con éxito')->with('typealert', 'success');
    }
}
