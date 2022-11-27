<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\RestauranteProducto;
use App\Http\Controllers\Controller;
use App\Models\RestauranteCategoria;
use App\Models\GaleriaRestauranteProducto;
use App\Http\Requests\RestauranteProductoFormRequest;

class RestauranteProductoController extends Controller
{
    public function index(RestauranteCategoria $categoria, Request $request)
    {
        if ($request) {
            $query = trim($request->get('searchText'));
            $productos = RestauranteProducto::where('restaurante_categoria_id',$categoria->id)
                ->where('nombre', 'LIKE', '%' . $query . '%')
                ->orderBy('id', 'desc')
                ->paginate(7);
            return view('restauranteproductos.index', ["productos" => $productos,'categoria' => $categoria, "searchText" => $query]);
        }
    }
    public function show(RestauranteCategoria $categoria, RestauranteProducto $producto)
    {
        return view('restauranteproductos.show', compact('producto','categoria'));
    }
    public function create(RestauranteCategoria $categoria)
    {
        return view('restauranteproductos.create', [
            'producto' => new RestauranteProducto(),
            'categoria' => $categoria,
        ]);
    }
    public function store(RestauranteCategoria $categoria,RestauranteProductoFormRequest $request)
    {
        $producto = (new RestauranteProducto())->fill($request->all());
        $producto->foto = crearimagen($request->hasFile('foto'), $request->file('foto'), RestauranteProducto::Namefoto(), RestauranteProducto::Rutafoto());
        $producto->restaurante_categoria_id = $categoria->id;
        $producto->save();
        return redirect()->route('productos_index',$categoria->id)->with('message', 'Guardado con éxito')->with('typealert', 'success');
    }
    public function edit(RestauranteCategoria $categoria,RestauranteProducto $producto)
    {
        return view('restauranteproductos.edit', [
            'producto' => $producto,
            'categoria' => $categoria,
        ]);
    }
    public function update(RestauranteProductoFormRequest $request, RestauranteCategoria $categoria,RestauranteProducto $producto)
    {
        $producto->foto = editarimagen($request->hasFile('foto'), $request->file('foto'), RestauranteProducto::Namefoto(), RestauranteProducto::Rutafoto(), $producto->foto, RestauranteProducto::Urldeletefoto());
        $producto->update($request->except('foto'));
        return redirect()->route('productos_index',$categoria->id)->with('message', 'Modificado con éxito')->with('typealert', 'success');
    }
    public function fotos(RestauranteCategoria $categoria,RestauranteProducto $producto)
    {
        return view('restauranteproductos.fotos', [
            'producto' => $producto,
            'categoria' => $categoria,
        ]);
    }
    public function fotosstore(RestauranteCategoria $categoria,RestauranteProducto $producto)
    {
        $this->validate(request(), [
            'foto' => 'required|mimes:jpeg,png,jpg,gif,svg|max:3072'
        ]);

        $galeria = new GaleriaRestauranteProducto();
        $galeria->save();
        $galeria->foto = crearimagen(request()->hasFile('foto'), request()->file('foto'), GaleriaRestauranteProducto::Name($producto->id, $galeria->id), GaleriaRestauranteProducto::Ruta());
        $galeria->restaurante_producto_id = $producto->id;
        $galeria->save();

        return redirect()->back()->with('message', 'Foto subida')->with('typealert', 'success');
    }
    public function fotosdelete(RestauranteCategoria $categoria,RestauranteProducto $producto, GaleriaRestauranteProducto $galeria)
    {
        eliminarimagen($galeria->foto, GaleriaRestauranteProducto::Ruta(), GaleriaRestauranteProducto::Urldelete());
        $galeria->delete();
        return redirect()->back()->with('message', 'Foto eliminada')->with('typealert', 'success');
    }
    public function destroy(RestauranteCategoria $categoria,RestauranteProducto $producto)
    {
        $existe = GaleriaRestauranteProducto::where('restaurante_producto_id', $producto->id)->exists();
        if ($existe) {
            return back()->with('message', 'No se puede eliminar el producto')->with('typealert', 'danger');
        }
        ///ELIMINAR FOTO
        eliminarimagen($producto->foto, RestauranteProducto::Rutafoto(), RestauranteProducto::Urldeletefoto());
        $producto->delete();
        return redirect()->route('productos_index',$categoria->id)->with('message', 'Eliminado con éxito')->with('typealert', 'success');
    }
}
