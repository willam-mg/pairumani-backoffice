<?php

namespace App\Http\Controllers;

use App\Models\Rol;
use App\Models\User;
use Illuminate\Support\str;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UsuarioFormRequest;

class UsuarioController extends Controller
{
    public function index(Request $request)
    {
        if ($request) {
            $query = trim($request->get('searchText'));
            $usuarios = User::with('rol')->where('nombre', 'LIKE', '%' . $query . '%')
                ->orwhere('apellido', 'LIKE', '%' . $query . '%')
                ->orderBy('id', 'desc')
                ->paginate(7);
            return view('usuarios.index', ["usuarios" => $usuarios, "searchText" => $query]);
        }
    }
    public function create()
    {
        return view('usuarios.create', [
            'usuario' => new User,
            'roles' => Rol::pluck('nombre', 'id')
        ]);
    }
    public function store(UsuarioFormRequest $request)
    {
        $usuario = new User;
        $usuario->nombre = $request->get('nombre');
        $usuario->apellido = $request->get('apellido');
        $usuario->email = $request->get('email');
        $usuario->telefono = $request->get('telefono');
        $usuario->direccion = $request->get('direccion');
        $usuario->rol_id = $request->get('rol_id');
        $usuario->api_token = str::random('60');
        $usuario->password = Hash::make($request->get('password'));
        $usuario->save();
        return redirect()->route('usuarios_index')->with('message', 'Guardado con éxito')->with('typealert', 'success');
    }
    public function edit(User $usuario)
    {
        return view("usuarios.edit", [
            'usuario' => $usuario,
            'roles' => Rol::pluck('nombre', 'id')
        ]);
    }
    public function update(UsuarioFormRequest $request, User $usuario)
    {
        $usuario->nombre = $request->get('nombre');
        $usuario->apellido = $request->get('apellido');
        $usuario->email = $request->get('email');
        $usuario->telefono = $request->get('telefono');
        $usuario->direccion = $request->get('direccion');
        $usuario->rol_id = $request->get('rol_id');
        if ($request->get('password') != "") $usuario->password = Hash::make($request->get('password'));
        $usuario->update();
        return redirect()->route('usuarios_index')->with('message', 'Modificado con éxito')->with('typealert', 'success');
    }
    public function destroy(User $usuario)
    {
        $usuario->delete();
        return redirect()->route('usuarios_index')->with('message', 'Eliminado con éxito')->with('typealert', 'success');
    }
    public function pdf()
    {
        $pdf =  PDF::loadview('usuarios.reporte', ['usuarios' => User::all()])->setPaper('letter', 'portrait');
        return $pdf->stream('reporte.pdf');
    }
}