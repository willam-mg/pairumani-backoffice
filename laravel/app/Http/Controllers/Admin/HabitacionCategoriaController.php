<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\HabitacionCategoriaFormRequest;
use App\Models\GaleriaHabitacion;
use App\Models\Habitacion;
use App\Models\HabitacionCategoria;
use Illuminate\Http\Request;

class HabitacionCategoriaController extends Controller
{
    public function index(Request $request)
    {
        if ($request) {
            $query = trim($request->get('searchText'));
            $categorias = HabitacionCategoria::where('nombre', 'LIKE', '%' . $query . '%')
                ->orderBy('id', 'desc')
                ->paginate(7);
            return view('habitacioncategorias.index', ["categorias" => $categorias, "searchText" => $query]);
        }
        return view('roles.index');
    }
    public function show(HabitacionCategoria $categoria)
    {
        return view('habitacioncategorias.show',compact('categoria'));
    }
    public function create()
    {
        return view('habitacioncategorias.create', [
            'categoria' => new HabitacionCategoria()
        ]);
    }
    public function store(HabitacionCategoriaFormRequest $request)
    {
        $categorias = (new HabitacionCategoria())->fill($request->all());
        $categorias->foto = crearimagen($request->hasFile('foto'), $request->file('foto'), HabitacionCategoria::Namefoto(), HabitacionCategoria::Rutafoto());
        $categorias->save();
        return redirect()->route('habitacioncategorias_index')->with('message', 'Guardado con éxito')->with('typealert', 'success');
    }
    public function edit(HabitacionCategoria $categoria)
    {
        return view('habitacioncategorias.edit', compact('categoria'));
    }
    public function update(HabitacionCategoriaFormRequest $request, HabitacionCategoria $categoria)
    {
        $categoria->foto = editarimagen($request->hasFile('foto'), $request->file('foto'), HabitacionCategoria::Namefoto(), HabitacionCategoria::Rutafoto(), $categoria->foto, HabitacionCategoria::Urldeletefoto());
        $categoria->update($request->except('foto'));
        return redirect()->route('habitacioncategorias_index')->with('message', 'Modificado con éxito')->with('typealert', 'success');
    }
    public function destroy(HabitacionCategoria $categoria)
    {
        $existe = Habitacion::where('habitacion_categoria_id', $categoria->id)->exists();
        if ($existe) {
            return back()->with('message', 'No se puede eliminar la categoria')->with('typealert', 'danger');
        }
        ///ELIMINAR FOTO
        eliminarimagen($categoria->foto, HabitacionCategoria::Rutafoto(), HabitacionCategoria::Urldeletefoto());
        $categoria->delete();
        return redirect()->route('habitacioncategorias_index')->with('message', 'Eliminado con éxito')->with('typealert', 'success');
    }
}
