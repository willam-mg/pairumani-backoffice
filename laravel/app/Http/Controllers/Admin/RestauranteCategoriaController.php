<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\RestauranteCategoriaFormRequest;
use App\Models\RestauranteCategoria;
use App\Models\RestauranteProducto;
use Illuminate\Http\Request;

class RestauranteCategoriaController extends Controller
{
    public function index(Request $request)
    {
        if ($request) {
            $query = trim($request->get('searchText'));
            $categorias = RestauranteCategoria::where('nombre', 'LIKE', '%' . $query . '%')
                ->orderBy('id', 'desc')
                ->paginate(7);
            return view('restaurantecategorias.index', ["categorias" => $categorias, "searchText" => $query]);
        }
    }
    public function show(RestauranteCategoria $categoria)
    {
        return view('restaurantecategorias.show', compact('categoria'));
    }
    public function create()
    {
        return view('restaurantecategorias.create', [
            'categoria' => new RestauranteCategoria()
        ]);
    }
    public function store(RestauranteCategoriaFormRequest $request)
    {
        $categoria = (new RestauranteCategoria())->fill($request->all());
        $categoria->foto = crearimagen($request->hasFile('foto'), $request->file('foto'), RestauranteCategoria::Namefoto(), RestauranteCategoria::Rutafoto());
        $categoria->save();
        return redirect()->route('restaurantecategorias_index')->with('message', 'Guardado con éxito')->with('typealert', 'success');
    }
    public function edit(RestauranteCategoria $categoria)
    {
        return view('restaurantecategorias.edit', compact('categoria'));
    }
    public function update(RestauranteCategoriaFormRequest $request, RestauranteCategoria $categoria)
    {
        $categoria->foto = editarimagen($request->hasFile('foto'), $request->file('foto'), RestauranteCategoria::Namefoto(), RestauranteCategoria::Rutafoto(), $categoria->foto, RestauranteCategoria::Urldeletefoto());
        $categoria->update($request->except('foto'));
        return redirect()->route('restaurantecategorias_index')->with('message', 'Modificado con éxito')->with('typealert', 'success');
    }
    public function destroy(RestauranteCategoria $categoria)
    {
        $existe = RestauranteProducto::where('restaurante_categoria_id', $categoria->id)->exists();
        if ($existe) {
            return back()->with('message', 'No se puede eliminar la categoria')->with('typealert', 'danger');
        }
        ///ELIMINAR FOTO
        eliminarimagen($categoria->foto, RestauranteCategoria::Rutafoto(), RestauranteCategoria::Urldeletefoto());
        $categoria->delete();
        return redirect()->route('restaurantecategorias_index')->with('message', 'Eliminado con éxito')->with('typealert', 'success');
    }
}
