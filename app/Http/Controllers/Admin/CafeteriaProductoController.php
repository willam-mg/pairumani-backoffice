<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\CafeteriaProducto;
use App\Http\Controllers\Controller;
use App\Models\CafeteriaCategoria;
use App\Models\GaleriaCafeteriaProducto;
use App\Http\Requests\CafeteriaProductoFormRequest;

class CafeteriaProductoController extends Controller
{
    public function index(CafeteriaCategoria $categoria, Request $request)
    {
        if ($request) {
            $query = trim($request->get('searchText'));
            $productos = CafeteriaProducto::where('cafeteria_categoria_id',$categoria->id)
                ->where('nombre', 'LIKE', '%' . $query . '%')
                ->orderBy('id', 'desc')
                ->paginate(7);
            return view('cafeteriaproductos.index', ["productos" => $productos,'categoria' => $categoria, "searchText" => $query]);
        }
    }
    public function show(CafeteriaCategoria $categoria, CafeteriaProducto $producto)
    {
        return view('cafeteriaproductos.show', compact('producto','categoria'));
    }
    public function create(CafeteriaCategoria $categoria)
    {
        return view('cafeteriaproductos.create', [
            'producto' => new CafeteriaProducto(),
            'categoria' => $categoria,
        ]);
    }
    public function store(CafeteriaCategoria $categoria,CafeteriaProductoFormRequest $request)
    {
        $producto = (new CafeteriaProducto())->fill($request->all());
        $producto->foto = crearimagen($request->hasFile('foto'), $request->file('foto'), CafeteriaProducto::Namefoto(), CafeteriaProducto::Rutafoto());
        $producto->cafeteria_categoria_id = $categoria->id;
        $producto->save();
        return redirect()->route('cafeteria_productos_index',$categoria->id)->with('message', 'Guardado con éxito')->with('typealert', 'success');
    }
    public function edit(CafeteriaCategoria $categoria,CafeteriaProducto $producto)
    {
        return view('cafeteriaproductos.edit', [
            'producto' => $producto,
            'categoria' => $categoria,
        ]);
    }
    public function update(CafeteriaProductoFormRequest $request, CafeteriaCategoria $categoria,CafeteriaProducto $producto)
    {
        $producto->foto = editarimagen($request->hasFile('foto'), $request->file('foto'), CafeteriaProducto::Namefoto(), CafeteriaProducto::Rutafoto(), $producto->foto, CafeteriaProducto::Urldeletefoto());
        $producto->update($request->except('foto'));
        return redirect()->route('cafeteria_productos_index',$categoria->id)->with('message', 'Modificado con éxito')->with('typealert', 'success');
    }
    public function fotos(CafeteriaCategoria $categoria,CafeteriaProducto $producto)
    {
        return view('cafeteriaproductos.fotos', [
            'producto' => $producto,
            'categoria' => $categoria,
        ]);
    }
    public function fotosstore(CafeteriaCategoria $categoria,CafeteriaProducto $producto)
    {
        $this->validate(request(), [
            'foto' => 'required|mimes:jpeg,png,jpg,gif,svg|max:3072'
        ]);

        $galeria = new GaleriaCafeteriaProducto();
        $galeria->save();
        $galeria->foto = crearimagen(request()->hasFile('foto'), request()->file('foto'), GaleriaCafeteriaProducto::Name($producto->id, $galeria->id), GaleriaCafeteriaProducto::Ruta());
        $galeria->cafeteria_producto_id = $producto->id;
        $galeria->save();

        return redirect()->back()->with('message', 'Foto subida')->with('typealert', 'success');
    }
    public function fotosdelete(CafeteriaCategoria $categoria,CafeteriaProducto $producto, GaleriaCafeteriaProducto $galeria)
    {
        eliminarimagen($galeria->foto, GaleriaCafeteriaProducto::Ruta(), GaleriaCafeteriaProducto::Urldelete());
        $galeria->delete();
        return redirect()->back()->with('message', 'Foto eliminada')->with('typealert', 'success');
    }
    public function destroy(CafeteriaCategoria $categoria,CafeteriaProducto $producto)
    {
        $existe = GaleriaCafeteriaProducto::where('cafeteria_producto_id', $producto->id)->exists();
        if ($existe) {
            return back()->with('message', 'No se puede eliminar el producto')->with('typealert', 'danger');
        }
        ///ELIMINAR FOTO
        eliminarimagen($producto->foto, CafeteriaProducto::Rutafoto(), CafeteriaProducto::Urldeletefoto());
        $producto->delete();
        return redirect()->route('cafeteria_productos_index',$categoria->id)->with('message', 'Eliminado con éxito')->with('typealert', 'success');
    }
}
