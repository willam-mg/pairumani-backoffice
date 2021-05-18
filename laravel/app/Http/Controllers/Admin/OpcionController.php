<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\OpcionFormRequest;
use App\Models\RestauranteCategoria;
use App\Models\RestauranteDetalleReservaProducto;
use App\Models\RestauranteProducto;
use App\Models\RestauranteProductoOpcion;
use Illuminate\Http\Request;

class OpcionController extends Controller
{
    public function index(RestauranteCategoria $categoria,RestauranteProducto $producto,Request $request)
    {
        if ($request) {
            $query = trim($request->get('searchText'));
            $opciones = RestauranteProductoOpcion::where('restaurante_producto_id',$producto->id)
                ->where('nombre', 'LIKE', '%' . $query . '%')
                ->orderBy('id', 'desc')
                ->paginate(7);
            return view('opciones.index', ['opciones' => $opciones,'categoria' => $categoria,'producto' => $producto,'searchText' => $query]);
        }
    }
    public function show(RestauranteCategoria $categoria, RestauranteProducto $producto,RestauranteProductoOpcion $opcion)
    {
        return view('opciones.show', compact('opcion','categoria','producto'));
    }
    public function create(RestauranteCategoria $categoria,RestauranteProducto $producto)
    {
        return view('opciones.create', [
            'opcion' => new RestauranteProductoOpcion(),
            'categoria' => $categoria,
            'producto' => $producto,
        ]);
    }
    public function store(OpcionFormRequest $request,RestauranteCategoria $categoria,RestauranteProducto $producto)
    {
        $opcion = (new RestauranteProductoOpcion())->fill($request->all());
        $opcion->restaurante_producto_id = $producto->id;
        $opcion->save();
        return redirect()->route('opciones_index',[$categoria->id,$producto->id])->with('message', 'Guardado con éxito')->with('typealert', 'success');
    }
    public function edit(RestauranteCategoria $categoria, RestauranteProducto $producto,RestauranteProductoOpcion $opcion)
    {
        return view('opciones.edit', compact('categoria','producto','opcion'));
    }
    public function update(OpcionFormRequest $request, RestauranteCategoria $categoria, RestauranteProducto $producto,RestauranteProductoOpcion $opcion)
    {
        $opcion->update($request->all());
        return redirect()->route('opciones_index',[$categoria->id,$producto->id])->with('message', 'Modificado con éxito')->with('typealert', 'success');
    }
    public function destroy(RestauranteCategoria $categoria,RestauranteProducto $producto,RestauranteProductoOpcion $opcion)
    {
        $existe = RestauranteDetalleReservaProducto::where('restaurante_producto_opciones_id', $opcion->id)->exists();
        if ($existe) {
            return back()->with('message', 'No se puede eliminar la opcion')->with('typealert', 'danger');
        }
        $opcion->delete();
        return redirect()->route('opciones_index',[$categoria->id, $producto->id])->with('message', 'Eliminado con éxito')->with('typealert', 'success');
    }
}
