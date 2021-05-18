<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PromocionFormRequest;
use App\Models\Habitacion;
use App\Models\Promocion;
use App\Models\Reserva;
use App\Models\ReservaPromocion;
use Illuminate\Http\Request;

class PromocionController extends Controller
{
    public function index(Request $request)
    {
        if ($request) {
            $query = trim($request->get('searchText'));
            $promociones = Promocion::where('nombre', 'LIKE', '%' . $query . '%')
                ->orderBy('id', 'desc')
                ->paginate(7);
            return view('promociones.index', ["promociones" => $promociones, "searchText" => $query]);
        }
    }
    public function show(Promocion $promocion)
    {
        return view('promociones.show', compact('promocion'));
    }
    public function create()
    {
        return view('promociones.create', [
            'promocion' => new Promocion(),
            'habitaciones' => Habitacion::pluck('nombre','id'),
        ]);
    }
    public function store(PromocionFormRequest $request)
    {
        $promocion = (new Promocion())->fill($request->all());
        $promocion->foto = crearimagen($request->hasFile('foto'), $request->file('foto'), Promocion::Namefoto(), Promocion::Rutafoto());
        $promocion->save();
        return redirect()->route('promociones_index')->with('message', 'Guardado con éxito')->with('typealert', 'success');
    }
    public function edit(Promocion $promocion)
    {
        return view('promociones.edit',[
            'promocion' => $promocion,
            'habitaciones' => Habitacion::pluck('nombre', 'id'),
        ]);
    }
    public function update(PromocionFormRequest $request, Promocion $promocion)
    {
        $promocion->foto = editarimagen($request->hasFile('foto'), $request->file('foto'), Promocion::Namefoto(), Promocion::Rutafoto(), $promocion->foto, Promocion::Urldeletefoto());
        $promocion->update($request->except('foto'));
        return redirect()->route('promociones_index')->with('message', 'Modificado con éxito')->with('typealert', 'success');
    }
    public function destroy(Promocion $promocion)
    {
        $existe = ReservaPromocion::where('promocion_id', $promocion->id)->exists();
        if ($existe) {
            return back()->with('message', 'No se puede eliminar la promocion')->with('typealert', 'danger');
        }
        ///ELIMINAR FOTO
        eliminarimagen($promocion->foto, Promocion::Rutafoto(), Promocion::Urldeletefoto());
        $promocion->delete();
        return redirect()->route('promociones_index')->with('message', 'Eliminado con éxito')->with('typealert', 'success');
    }
}
