<?php

namespace App\Http\Controllers\Admin;

use App\Models\Habitacion;
use Illuminate\Http\Request;
use App\Models\HabitacionFrigobar;
use App\Models\HabitacionCategoria;
use App\Http\Controllers\Controller;
use App\Http\Requests\HabitacionFrigobarFormRequest;

class HabitacionFrigobarController extends Controller
{
    public function index(Request $request, HabitacionCategoria $categoria, Habitacion $habitacion)
    {
        if($request)
        {
            $query = trim($request->get('searchText'));
            $frigobars = HabitacionFrigobar::where('habitacion_id', $habitacion->id)
                ->where('nombre', 'LIKE', '%' . $query . '%')
                ->orderBy('id', 'desc')
                ->paginate(7);
            return view('habitacionfrigobar.index', ['categoria' => $categoria,'habitacion' => $habitacion,'frigobars' => $frigobars, 'searchText' => $query]);
        }

    }
    public function show(HabitacionCategoria $categoria, Habitacion $habitacion,HabitacionFrigobar $frigobar)
    {
        return view('habitacionfrigobar.show',compact('categoria','habitacion','frigobar'));
    }
    public function create(HabitacionCategoria $categoria,Habitacion $habitacion)
    {
        return view('habitacionfrigobar.create', [
            'categoria' => $categoria,
            'habitacion' => $habitacion,
            'frigobar' => new HabitacionFrigobar(),
        ]);
    }
    public function store(HabitacionFrigobarFormRequest $request,Habitacion $habitacion)
    {
        $existe = HabitacionFrigobar::where('nombre',$request->get('nombre'))->exists();
        if ($existe) {
            return redirect()->back()->with('message', 'El producto ya existe')->with('typealert', 'danger');
        }
        $frigobar = (new HabitacionFrigobar())->fill($request->all());
        $frigobar->habitacion_id = $habitacion->id;
        $frigobar->save();
        return redirect()->route('habitacionfrigobar_index', [$habitacion->id])->with('message', 'Guardado con éxito')->with('typealert', 'success');
    }
    public function edit(Habitacion $habitacion,HabitacionFrigobar $frigobar)
    {
        return view('habitacionfrigobar.edit', compact('habitacion','frigobar'));
    }
    public function update(HabitacionFrigobarFormRequest $request, Habitacion $habitacion,HabitacionFrigobar $frigobar)
    {
        $frigobar->update($request->all());
        return redirect()->route('habitacionfrigobar_index', [$habitacion->id])->with('message', 'Modificado con éxito')->with('typealert', 'success');
    }
    public function destroy(HabitacionFrigobar $frigobar)
    {
        $habitacionId = $frigobar->habitacion_id;
        $frigobar->delete();
        return redirect()->route('habitacionfrigobar_index', [$habitacionId])->with('message', 'Eliminado con éxito')->with('typealert', 'success');
    }
}