<?php

namespace App\Http\Controllers;

use App\Models\Rol;
use App\Models\User;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use App\Http\Requests\RolFormRequest;

class RolController extends Controller
{
    public function index(Request $request)
    {
        if ($request) {
            $query = trim($request->get('searchText'));
            $roles = Rol::where('nombre', 'LIKE', '%' . $query . '%')
                ->orderBy('id', 'desc')
                ->paginate(7);
            return view('roles.index', ["roles" => $roles, "searchText" => $query]);
        }
        return view('roles.index');
    }
    public function create()
    {
        return view('roles.create', [
            'rol' => new Rol
        ]);
    }
    public function store(RolFormRequest $request)
    {
        $rol = new Rol();
        $rol->nombre = $request->get('nombre');
        $rol->descripcion = $request->get('descripcion');
        $rol->permisos = '{}';
        $rol->save();

        return redirect()->route('roles_index')->with('message', 'Guardado con éxito')->with('typealert', 'success');
    }
    public function edit(Rol $rol)
    {
        return view('roles.edit', compact('rol'));
    }
    public function update(RolFormRequest $request, Rol $rol)
    {
        $rol->nombre = $request->get('nombre');
        $rol->descripcion = $request->get('descripcion');
        $rol->update();

        return redirect()->route('roles_index')->with('message', 'Modificado con éxito')->with('typealert', 'success');
    }
    public function destroy(Rol $rol)
    {
        $existe = User::where('rol_id', $rol->id)->exists();

        if ($existe) {
            return back()->with('message', 'No se puede eliminar el rol')->with('typealert', 'danger');
        }
        $rol->delete();
        return redirect()->route('roles_index')->with('message', 'Eliminado con éxito')->with('typealert', 'success');
    }
    public function getrolpermisos(Rol $rol)
    {
        return view('roles.permisos', compact('rol'));
    }
    public function postrolpermisos(Rol $rol, Request $request)
    {
        $rol->permisos = json_encode($request->except(['_token']));
        $rol->save();

        return redirect()->route('roles_permisos', $rol->id)->with('message', 'Guardado con éxito')->with('typealert', 'success');
    }
    public function pdf()
    {
        $pdf =  PDF::loadView('roles.reporte', ['roles' => Rol::all()])->setPaper('letter', 'portrait');
        return $pdf->stream('reporte.pdf');
    }
}