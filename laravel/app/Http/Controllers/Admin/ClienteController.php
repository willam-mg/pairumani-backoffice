<?php

namespace App\Http\Controllers\Admin;

use App\Models\Cliente;
use App\Models\Reserva;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\ClienteFormRequest;
use App\Models\Hospedaje;
use App\Models\Promocion;
use App\Models\ReservaPromocion;

class ClienteController extends Controller
{
    public function index(Request $request)
    {
        if ($request) {
            $query = trim($request->get('searchText'));
            $clientes = Cliente::where('nombres', 'LIKE', '%' . $query . '%')
                ->orwhere('apellidos','LIKE','%'.$query.'%')
                ->orwhere('tipo_documento', 'LIKE', '%' . $query . '%')
                ->orwhere('num_documento', 'LIKE', '%' . $query . '%')
                ->orwhere('celular', 'LIKE', '%' . $query . '%')
                ->orderBy('id', 'desc')
                ->paginate(7);
            return view('clientes.index', ["clientes" => $clientes, "searchText" => $query]);
        }
    }
    public function show(Cliente $cliente)
    {
        return view('clientes.show',compact('cliente'));
    }
    public function create($tipo = null,$categoria=null,$habitacion=null,$reserva=null,$promocion=null)
    {
        return view('clientes.create', [
            'cliente' => new Cliente(),
            'tipo' => $tipo,
            'categoria' => $categoria,
            'habitacion' => $habitacion,
            'reserva' => $reserva,
            'promocion' => $promocion,
        ]);
    }
    public function store(ClienteFormRequest $request, $tipo = null,$categoria=null,$habitacion=null,$reserva=null,$promocion=null)
    {
        $cliente = (new Cliente())->fill($request->all());
        $cliente->api_token = str::random('60');
        $cliente->password = Hash::make($request->get('email'));
        $cliente->save();
        if($tipo == Reserva::TIPO){
            return redirect()->route('reservas_create',[$categoria,$habitacion,$reserva,$cliente]);
        }elseif($tipo == Hospedaje::TIPO){
            return redirect()->route('hospedajes_create',$cliente);
        }elseif($tipo == ReservaPromocion::TIPO){
            return redirect()->route('promocionreservas_create', [$promocion,$cliente]);
        }else{
            return redirect()->route('clientes_index')->with('message', 'Guardado con éxito')->with('typealert', 'success');
        }
    }
    public function edit(Cliente $cliente,$tipo=null)
    {
        return view('clientes.edit',[
            'cliente' => $cliente,
            'tipo' => $tipo,
        ]);
    }
    public function update(ClienteFormRequest $request, Cliente $cliente)
    {
        $cliente->update($request->all());
        return redirect()->route('clientes_index')->with('message', 'Modificado con éxito')->with('typealert', 'success');
    }
    public function destroy(Cliente $cliente)
    {
        $existe = Reserva::where('cliente_id', $cliente->id)->exists();
        if ($existe) {
            return back()->with('message', 'No se puede eliminar el cliente')->with('typealert', 'danger');
        }
        $cliente->delete();
        return redirect()->route('clientes_index')->with('message', 'Eliminado con éxito')->with('typealert', 'success');
    }
}
