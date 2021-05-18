<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\RestauranteProducto;
use App\Http\Controllers\Controller;
use App\Models\RestauranteCategoria;
use App\Http\Requests\TamanoFormRequest;
use App\Models\RestauranteProductoTamano;
use App\Models\RestauranteDetalleReservaProducto;

class TamanoController extends Controller
{
    public function index(RestauranteCategoria $categoria, RestauranteProducto $producto, Request $request)
    {
        if ($request) {
            $query = trim($request->get('searchText'));
            $tamano = RestauranteProductoTamano::where('restaurante_producto_id', $producto->id)
                ->where('nombre', 'LIKE', '%' . $query . '%')
                ->orderBy('id', 'desc')
                ->paginate(7);
            return view('tamanos.index', ['tamano' => $tamano, 'categoria' => $categoria, 'producto' => $producto, 'searchText' => $query]);
        }
    }
    public function show(RestauranteCategoria $categoria, RestauranteProducto $producto, RestauranteProductoTamano $tamano)
    {
        return view('tamanos.show', compact('tamano', 'categoria', 'producto'));
    }
    public function create(RestauranteCategoria $categoria, RestauranteProducto $producto)
    {
        return view('tamanos.create', [
            'tamano' => new RestauranteProductoTamano(),
            'categoria' => $categoria,
            'producto' => $producto,
        ]);
    }
    public function store(TamanoFormRequest $request, RestauranteCategoria $categoria, RestauranteProducto $producto)
    {
        $tamaño = (new RestauranteProductoTamano())->fill($request->all());
        $tamaño->restaurante_producto_id = $producto->id;
        $tamaño->save();
        return redirect()->route('tamanos_index', [$categoria->id, $producto->id])->with('message', 'Guardado con éxito')->with('typealert', 'success');
    }
    public function edit(RestauranteCategoria $categoria, RestauranteProducto $producto, RestauranteProductoTamano $tamano)
    {
        return view('tamanos.edit', compact('categoria', 'producto', 'tamano'));
    }
    public function update(TamanoFormRequest $request, RestauranteCategoria $categoria, RestauranteProducto $producto, RestauranteProductoTamano $tamano)
    {
        $tamano->update($request->all());
        return redirect()->route('tamanos_index', [$categoria->id, $producto->id])->with('message', 'Modificado con éxito')->with('typealert', 'success');
    }
    public function destroy(RestauranteCategoria $categoria, RestauranteProducto $producto, RestauranteProductoTamano $tamano)
    {
        $existe = RestauranteDetalleReservaProducto::where('restaurante_producto_tamanho_id', $tamano->id)->exists();
        if ($existe) {
            return back()->with('message', 'No se puede eliminar la opcion')->with('typealert', 'danger');
        }
        $tamano->delete();
        return redirect()->route('tamanos_index', [$categoria->id, $producto->id])->with('message', 'Eliminado con éxito')->with('typealert', 'success');
    }
}