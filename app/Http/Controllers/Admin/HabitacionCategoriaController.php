<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\HabitacionCategoriaFormRequest;
use App\Models\GaleriaHabitacion;
use App\Models\Habitacion;
use App\Models\HabitacionCategoria;
use Illuminate\Database\Events\TransactionBeginning;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

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
        try {
            DB::beginTransaction();
            $categorias = (new HabitacionCategoria())->fill($request->all());
            $categorias->foto = crearimagen($request->hasFile('foto'), $request->file('foto'), HabitacionCategoria::Namefoto(), HabitacionCategoria::Rutafoto());
            $categorias->save();
            DB::commit();
            return redirect()->route('habitacioncategorias_index')->with('message', 'Guardado con éxito')->with('typealert', 'success');
        } catch (\Throwable $th) {
            DB::rollBack();
            Session::flash('warning', $th->getMessage()); 
        }
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
        try {
            DB::beginTransaction();
            if (Habitacion::where('habitacion_categoria_id', $categoria->id)->exists()) {
                throw new \Exception("No se puede eliminar la categoria");
            }
            ///ELIMINAR FOTO
            eliminarimagen($categoria->foto, HabitacionCategoria::Rutafoto(), HabitacionCategoria::Urldeletefoto());
            $categoria->delete();
            DB::commit();
            return redirect()->route('habitacioncategorias_index')->with('message', 'Eliminado con éxito')->with('typealert', 'success');
        } catch (\Throwable $th) {
            DB::rollback();
            return back()->with('message', $th->getMessage())->with('typealert', 'danger');
        }
    }
}
