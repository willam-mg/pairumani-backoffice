<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\CafeteriaProducto;
use App\Http\Controllers\Controller;
use App\Models\CafeteriaCategoria;
use App\Http\Requests\CafeteriaTamanoFormRequest;
use App\Models\CafeteriaProductoTamano;
use App\Models\CafeteriaDetalleReservaProducto;

class CafeteriaTamanoController extends Controller
{
    public function index(CafeteriaCategoria $categoria, CafeteriaProducto $producto, Request $request)
    {
        if ($request) {
            $query = trim($request->get('searchText'));
            $tamano = CafeteriaProductoTamano::where('cafeteria_producto_id', $producto->id)
                ->where('nombre', 'LIKE', '%' . $query . '%')
                ->orderBy('id', 'desc')
                ->paginate(7);
            return view('cafeteriatamanos.index', ['tamano' => $tamano, 'categoria' => $categoria, 'producto' => $producto, 'searchText' => $query]);
        }
    }
    public function show(CafeteriaCategoria $categoria, CafeteriaProducto $producto, CafeteriaProductoTamano $tamano)
    {
        return view('cafeteriatamanos.show', compact('tamano', 'categoria', 'producto'));
    }
    public function create(CafeteriaCategoria $categoria, CafeteriaProducto $producto)
    {
        return view('cafeteriatamanos.create', [
            'tamano' => new CafeteriaProductoTamano(),
            'categoria' => $categoria,
            'producto' => $producto,
        ]);
    }
    public function store(CafeteriaTamanoFormRequest $request, CafeteriaCategoria $categoria, CafeteriaProducto $producto)
    {
        $tamaño = (new CafeteriaProductoTamano())->fill($request->all());
        $tamaño->Cafeteria_producto_id = $producto->id;
        $tamaño->save();
        return redirect()->route('cafeteria_tamanos_index', [$categoria->id, $producto->id])->with('message', 'Guardado con éxito')->with('typealert', 'success');
    }
    public function edit(CafeteriaCategoria $categoria, CafeteriaProducto $producto, CafeteriaProductoTamano $tamano)
    {
        return view('cafeteriatamanos.edit', compact('categoria', 'producto', 'tamano'));
    }
    public function update(CafeteriaTamanoFormRequest $request, CafeteriaCategoria $categoria, CafeteriaProducto $producto, CafeteriaProductoTamano $tamano)
    {
        $tamano->update($request->all());
        return redirect()->route('cafeteria_tamanos_index', [$categoria->id, $producto->id])->with('message', 'Modificado con éxito')->with('typealert', 'success');
    }
    public function destroy(CafeteriaCategoria $categoria, CafeteriaProducto $producto, CafeteriaProductoTamano $tamano)
    {
        $existe = CafeteriaDetalleReservaProducto::where('Cafeteria_producto_tamano_id', $tamano->id)->exists();
        if ($existe) {
            return back()->with('message', 'No se puede eliminar la opcion')->with('typealert', 'danger');
        }
        $tamano->delete();
        return redirect()->route('cafeteria_tamanos_index', [$categoria->id, $producto->id])->with('message', 'Eliminado con éxito')->with('typealert', 'success');
    }
}