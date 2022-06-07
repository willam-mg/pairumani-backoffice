<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CafeteriaOpcionFormRequest;
use App\Models\CafeteriaCategoria;
use App\Models\CafeteriaDetalleReservaProducto;
use App\Models\CafeteriaProducto;
use App\Models\CafeteriaProductoOpcion;
use Illuminate\Http\Request;

class CafeteriaOpcionController extends Controller
{
    public function index(CafeteriaCategoria $categoria,CafeteriaProducto $producto,Request $request)
    {
        if ($request) {
            $query = trim($request->get('searchText'));
            $opciones = CafeteriaProductoOpcion::where('cafeteria_producto_id',$producto->id)
                ->where('nombre', 'LIKE', '%' . $query . '%')
                ->orderBy('id', 'desc')
                ->paginate(7);
            return view('cafeteriaopciones.index', ['opciones' => $opciones,'categoria' => $categoria,'producto' => $producto,'searchText' => $query]);
        }
    }
    public function show(CafeteriaCategoria $categoria, CafeteriaProducto $producto,CafeteriaProductoOpcion $opcion)
    {
        return view('cafeteriaopciones.show', compact('opcion','categoria','producto'));
    }
    public function create(CafeteriaCategoria $categoria,CafeteriaProducto $producto)
    {
        return view('cafeteriaopciones.create', [
            'opcion' => new CafeteriaProductoOpcion(),
            'categoria' => $categoria,
            'producto' => $producto,
        ]);
    }
    public function store(CafeteriaOpcionFormRequest $request,CafeteriaCategoria $categoria,CafeteriaProducto $producto)
    {
        $opcion = (new CafeteriaProductoOpcion())->fill($request->all());
        $opcion->Cafeteria_producto_id = $producto->id;
        $opcion->save();
        return redirect()->route('cafeteria_opciones_index',[$categoria->id,$producto->id])->with('message', 'Guardado con éxito')->with('typealert', 'success');
    }
    public function edit(CafeteriaCategoria $categoria, CafeteriaProducto $producto,CafeteriaProductoOpcion $opcion)
    {
        return view('cafeteriaopciones.edit', compact('categoria','producto','opcion'));
    }
    public function update(CafeteriaOpcionFormRequest $request, CafeteriaCategoria $categoria, CafeteriaProducto $producto,CafeteriaProductoOpcion $opcion)
    {
        $opcion->update($request->all());
        return redirect()->route('cafeteria_opciones_index',[$categoria->id,$producto->id])->with('message', 'Modificado con éxito')->with('typealert', 'success');
    }
    public function destroy(CafeteriaCategoria $categoria,CafeteriaProducto $producto,CafeteriaProductoOpcion $opcion)
    {
        $existe = CafeteriaDetalleReservaProducto::where('Cafeteria_producto_opciones_id', $opcion->id)->exists();
        if ($existe) {
            return back()->with('message', 'No se puede eliminar la opcion')->with('typealert', 'danger');
        }
        $opcion->delete();
        return redirect()->route('cafeteria_opciones_index',[$categoria->id, $producto->id])->with('message', 'Eliminado con éxito')->with('typealert', 'success');
    }
}
