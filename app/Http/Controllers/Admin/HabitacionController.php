<?php

namespace App\Http\Controllers\Admin;

use App\Models\Habitacion;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\HabitacionFormRequest;
use App\Models\GaleriaHabitacion;
use App\Models\HabitacionCategoria;
use App\Models\HabitacionFrigobar;

class HabitacionController extends Controller
{
    public function index(HabitacionCategoria $categoria = null, Request $request)
    {
        if ($request) {
            $query = trim($request->get('searchText'));
            $habitaciones = Habitacion::when($categoria, function($query) use ($categoria) {
                    $query->where('habitacion_categoria_id',$categoria->id);
                })
                ->orwhere('nombre', 'LIKE', '%' . $query . '%')
                ->orwhere('num_habitacion','LIKE','%'. $query .'%')
                // ->where('habitacion_categoria_id', $categoria->id)
                ->orderBy('id', 'desc')
                ->paginate(7);
            return view('habitaciones.index', ["habitaciones" => $habitaciones,'categoria' => $categoria, "searchText" => $query]);
        }
    }
    public function show(HabitacionCategoria $categoria, Habitacion $habitacion)
    {
        return view('habitaciones.show',compact('habitacion','categoria'));
    }
    public function create()
    {
        $categorias = HabitacionCategoria::all();
        return view('habitaciones.create', [
            'categorias' => $categorias,
            'habitacion' => new Habitacion(),
        ]);
    }
    public function store(HabitacionFormRequest $request)
    {
        $habitacion = (new Habitacion())->fill($request->all());
        $habitacion->foto = crearimagen($request->hasFile('foto'), $request->file('foto'), Habitacion::Namefoto(), Habitacion::Rutafoto());
        $habitacion->save();
        return redirect()->route('habitaciones_index')->with('message', 'Guardado con éxito')->with('typealert', 'success');
    }
    public function edit(Habitacion $habitacion)
    {
        $categorias = HabitacionCategoria::all();
        return view('habitaciones.edit',[
            'categorias' => $categorias,
            'habitacion' => $habitacion,
        ]);
    }
    public function update(HabitacionFormRequest $request, Habitacion $habitacion)
    {
        if($habitacion->hospedaje != null){
            if($habitacion->hospedaje->all()->last()->estado == 'Ocupado' && $habitacion->estado == 'Ocupado'){
                return redirect()->back()->with('message', 'No se pudo cambiar de estado ya tiene un hospedaje')->with('typealert', 'danger');
            }
        }
        $habitacion->foto = editarimagen($request->hasFile('foto'), $request->file('foto'), Habitacion::Namefoto(), Habitacion::Rutafoto(), $habitacion->foto, Habitacion::Urldeletefoto());
        $habitacion->update($request->except('foto'));
        return redirect()->route('habitaciones_index')->with('message', 'Modificado con éxito')->with('typealert', 'success');
    }
    public function fotos(Habitacion $habitacion)
    {
        return view('habitaciones.fotos', [
            'habitacion' => $habitacion
        ]);
    }
    public function fotosstore(Habitacion $habitacion)
    {
        $this->validate(request(), [
            'foto' => 'required|mimes:jpeg,png,jpg,gif,svg|max:3072',
        ]);

        $galeria = new GaleriaHabitacion();
        $galeria->foto = crearimagen(request()->hasFile('foto'), request()->file('foto'), GaleriaHabitacion::Name($habitacion->id, $galeria->id), GaleriaHabitacion::Ruta());
        $galeria->habitacion_id = $habitacion->id;
        $galeria->descripcion = request()->post('descripcion');
        $galeria->save();

        return redirect()->back()->with('message', 'Foto subida')->with('typealert', 'success');
    }
    public function fotosdelete(Habitacion $habitacion, GaleriaHabitacion $galeria)
    {
        eliminarimagen($galeria->foto, GaleriaHabitacion::Ruta(), GaleriaHabitacion::Urldelete());
        $galeria->delete();
        return redirect()->back()->with('message', 'Foto eliminada')->with('typealert', 'success');
    }
    public function destroy(Habitacion $habitacion)
    {
        $existe = GaleriaHabitacion::where('habitacion_id', $habitacion->id)->exists();
        if ($existe) {
            return back()->with('message', 'No se puede eliminar la habitacion')->with('typealert', 'danger');
        }
        ///ELIMINAR FOTO
        eliminarimagen($habitacion->foto, Habitacion::Rutafoto(), Habitacion::Urldeletefoto());
        $habitacion->delete();
        return redirect()->route('habitaciones_index')->with('message', 'Eliminado con éxito')->with('typealert', 'success');
    }
}