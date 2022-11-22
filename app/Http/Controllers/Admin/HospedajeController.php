<?php

namespace App\Http\Controllers\Admin;

use App\Models\Cliente;
use App\Models\Hospedaje;
use App\Models\Promocion;
use App\Models\Habitacion;
use App\Models\Transporte;
use App\Models\Acompanante;
use Illuminate\Http\Request;
use App\Models\LugarTuristico;
use App\Models\ReservaCafeteria;
use App\Models\CafeteriaProducto;
use App\Models\ReservaRestaurante;
use App\Models\RestauranteProducto;
use App\Http\Controllers\Controller;
use App\Models\ReservaLugarTuristico;
use App\Models\CafeteriaDetalleReserva;
use App\Models\CafeteriaProductoTamano;
use App\Models\RestauranteDetalleReserva;
use App\Models\RestauranteProductoOpcion;
use App\Models\RestauranteProductoTamano;
use App\Models\HospedajeDetalleTransporte;
use App\Http\Requests\HospedajeFormRequest;
use App\Models\CafeteriaDetalleReservaProducto;
use App\Models\CafeteriaProductoOpcion;
use App\Models\HabitacionFrigobar;
use App\Models\HospedajeDetalleAcompanante;
use App\Models\HospedajeDetalleFrigobar;
use App\Models\RestauranteDetalleReservaProducto;

class HospedajeController extends Controller
{
    public function index(Request $request)
    {
        if ($request) {
            $query = trim($request->get('searchText'));
            $hospedajes = Hospedaje::join('clientes','hospedajes.cliente_id','clientes.id')
                ->join('habitaciones','hospedajes.habitacion_id','habitaciones.id')
                ->select('hospedajes.*')
                ->where('clientes.nombres', 'LIKE', '%' . $query . '%')
                ->orwhere('clientes.apellidos', 'LIKE', '%' . $query . '%')
                ->orwhere('habitaciones.nombre', 'LIKE', '%' . $query . '%')
                ->orwhere('habitaciones.num_habitacion', 'LIKE', '%' . $query . '%')
                ->orwhere('clientes.celular', 'LIKE', '%' . $query . '%')
                ->orderBy('hospedajes.id', 'desc')
                ->paginate(7);
            return view('hospedajes.index', ["hospedajes" => $hospedajes, "searchText" => $query]);
        }
    }
    public function show(Hospedaje $hospedaje)
    {
        return view('hospedajes.show',compact('hospedaje'));
    }
    public function promocion(Request $request,$id)
    {
        $promocion = Promocion::where('habitacion_id',$id)->first();
        if($promocion != null){
            $promocion->load('habitacion');
            return response()->json($promocion);
        }
    }
    public function acompanante(Request $request,$id)
    {
        if ($request->ajax()) {
            $acompañantescount = Acompanante::where('cliente_id', $id)->count();
            if ($acompañantescount > 0) {
                $acompañantes = Acompanante::where('cliente_id', $id)->get();
            } else {
                $acompañantes = '';
            }
            return response(json_encode($acompañantes), 200)->header('Content-type', 'text/plain');
        }
    }
    public function create($cliente=null)
    {
        $hospedaje = new Hospedaje();
        $hospedaje->cliente_id = $cliente;
        return view('hospedajes.create', [
            'hospedaje' => $hospedaje,
            'clientes' => Cliente::get()->pluck('nombre_completo','id'),
            'habitaciones' => Habitacion::where('estado','Disponible')->pluck('nombre','id'),
            'tipo' => Hospedaje::TIPO,
            'detalles' => $hospedaje->detalleacompanantes,
        ]);
    }
    public function store(HospedajeFormRequest $request)
    {
        $existe = Hospedaje::where('cliente_id',$request->get('cliente_id'))->where('habitacion_id',$request->get('habitacion_id'))->where('estado','Ocupado')->exists();
        if($existe){
            return redirect()->route('hospedajes_index')->with('message', 'La habitacion ya fue registrada')->with('typealert', 'danger');
        }
        $habitacion = Habitacion::findOrFail($request->get('habitacion_id'));
        $acompañantes = Acompanante::where('cliente_id',$request->get('cliente_id'))->get();
        $hospedaje = (new Hospedaje())->fill($request->all());
        $hospedaje->precio = $habitacion->precio;
        $hospedaje->precio_promocion = $habitacion->promocion ? $habitacion->promocion->precio : NULL;
        $hospedaje->estado = 'Ocupado';
        $hospedaje->save();
        //cambio de estado de la habitación
        $habitacion = Habitacion::find($hospedaje->habitacion_id);
        $habitacion->estado = 'Ocupado';
        $habitacion->save();
        //registramos los acompañantes del cliente que se hospedara
        foreach ($acompañantes as $acompañante) {
            $detalle = new HospedajeDetalleAcompanante();
            $detalle->hospedaje_id = $hospedaje->id;
            $detalle->nombre = $acompañante->nombre;
            $detalle->num_documento = $acompañante->num_documento;
            $detalle->nacionalidad = $acompañante->nacionalidad;
            $detalle->ciudad = $acompañante->ciudad;
            $detalle->save();
        }
        return redirect()->route('hospedajes_index')->with('message', 'Guardado con éxito')->with('typealert', 'success');
    }
    public function edit(Hospedaje $hospedaje)
    {
        return view('hospedajes.edit', [
            'clientes' => Cliente::get()->pluck('nombre_completo', 'id'),
            'hospedaje' => $hospedaje,
        ]);
    }
    public function update(HospedajeFormRequest $request, Hospedaje $hospedaje)
    {
        $hospedaje->update($request->all());
        return redirect()->route('hospedajes_index')->with('message', 'Modificado con éxito')->with('typealert', 'success');
    }
    public function destroy(Hospedaje $hospedaje)
    {
        $existe = ReservaRestaurante::where('hospedaje_id',$hospedaje->id)->exists();
        if($existe){
            return redirect()->back()->with('message', 'No se puede eliminar el hospedaje')->with('typealert', 'danger');
        }
        $habitacion = Habitacion::FindOrFail($hospedaje->habitacion_id);
        $habitacion->estado = 'Disponible';
        $habitacion->save();
        $hospedaje->delete();
        return redirect()->route('hospedajes_index')->with('message', 'Eliminado con éxito')->with('typealert', 'success');
    }
    public function transporte(Hospedaje $hospedaje)
    {
        return view('hospedajes.transporte',[
            'hospedaje' => $hospedaje,
            'detalle' => new HospedajeDetalleTransporte(),
            'transportes' => Transporte::all(),
            'detalles' => $hospedaje->detalletransportes,
        ]);
    }
    public function transportestore(Hospedaje $hospedaje)
    {
        //registro de los transportes
        $transporte_id = request()->get('transporte_id');
        $precio = request()->get('precio');
        $cont = 0;

        while ($cont < count($transporte_id)) {
            $detalle = new HospedajeDetalleTransporte();
            $detalle->hospedaje_id = $hospedaje->id;
            $detalle->transporte_id = $transporte_id[$cont];
            $detalle->precio = $precio[$cont];
            $detalle->fecha = date('Y-m-d');
            $detalle->save();
            $cont = $cont + 1;
        }

        return redirect()->back()->with('message', 'Guardado con éxito')->with('typealert', 'success');
    }
    public function transportesdestroy(Hospedaje $hospedaje,HospedajeDetalleTransporte $detalle,Transporte $transporte)
    {
        $eliminar = HospedajeDetalleTransporte::where('id', $detalle->id)->where('hospedaje_id', $hospedaje->id)->where('transporte_id', $transporte->id)->first();
        $eliminar->delete();
        return redirect()->back()->with('message', 'Eliminado con éxito')->with('typealert', 'success');
    }
    public function lugar(Hospedaje $hospedaje)
    {
        return view('hospedajes.lugar',[
            'hospedaje' => $hospedaje,
            'lugares' => LugarTuristico::all(),
        ]);
    }
    public function lugarstore(Hospedaje $hospedaje)
    {
        $lugar = explode("_", request()->get('lugar_turistico_id'));
        $reserva = new ReservaLugarTuristico();
        $reserva->cliente_id = NULL;
        $reserva->fecha = request()->get('fecha');
        $reserva->lugar_turistico_id = $lugar[0];
        $reserva->estado = 'Reservado';
        $reserva->hospedaje_id = $hospedaje->id;
        $reserva->precio = $lugar[1];
        $reserva->save();
        
        return redirect()->route('reservaslugaresturisticos_index',$lugar[0])->with('message', 'Guardado con éxito')->with('typealert', 'success');
    }
    public function opciones(Request $request,Hospedaje $hospedaje, $id)
    {
        if ($request->ajax()) {
            $opcionescount = RestauranteProductoOpcion::where('restaurante_producto_id', $id)->count();
            if($opcionescount > 0){
                $opciones = RestauranteProductoOpcion::where('restaurante_producto_id', $id)->get();
            }else{
                $opciones = '';
            }
            return response()->json($opciones);
        }
    }
    public function tamanos(Request $request,Hospedaje $hospedaje, $id)
    {
        if ($request->ajax()) {
            $tamañoscount = RestauranteProductoTamano::where('restaurante_producto_id', $id)->count();
            if($tamañoscount > 0){
                $tamaños = RestauranteProductoTamano::where('restaurante_producto_id', $id)->get();
            }else{
                $tamaños = '';
            }
            return response()->json($tamaños);
        }
    }
    public function productos(Hospedaje $hospedaje)
    {
        return view('hospedajes.productos',[
            'hospedaje' => $hospedaje,
            'productos' => RestauranteProducto::all(),
        ]);
    }
    public function productosstore(Request $request,Hospedaje $hospedaje)
    {
        $restaurante = new ReservaRestaurante();
        $restaurante->cliente_id = NULL;
        $restaurante->fecha = date('Y-m-d');
        $restaurante->hora = date('H:i:s');
        $restaurante->total = $request->get('total_venta');
        $restaurante->hospedaje_id = $hospedaje->id;
        $restaurante->save();

        //DETALLE RESERVA
        $producto_id = $request->get('producto_id');
        $cantidad = $request->get('cantidad');
        $precio = $request->get('precio');
        $opcion_id = $request->get('opcion_id');
        $tamaño_id = $request->get('tamaño_id');
        $preciotamaño = $request->get('preciotamaño');

        $cont = 0;

        while ($cont < count($producto_id)) {
            $detalle = new RestauranteDetalleReserva();
            $detalle->restaurante_reserva_id = $restaurante->id;
            $detalle->restaurante_producto_id = $producto_id[$cont];
            $detalle->precio = $precio[$cont];
            $detalle->cantidad = $cantidad[$cont];
            $detalle->save();

            $detalleproducto = new RestauranteDetalleReservaProducto();
            $detalleproducto->restaurante_detalle_reserva_id = $detalle->id;
            $detalleproducto->restaurante_producto_opciones_id = $opcion_id[$cont];
            $detalleproducto->restaurante_producto_tamanho_id = $tamaño_id[$cont];
            $detalleproducto->precio_tamanho = $preciotamaño[$cont];
            $detalleproducto->save();

            $cont = $cont + 1;
        }

        return redirect()->route('restaurantes_index')->with('message', 'Guardado con éxito')->with('typealert', 'success');
    }
    public function cafeteriaopciones(Request $request,Hospedaje $hospedaje, $id)
    {
        if ($request->ajax()) {
            $opcionescount = CafeteriaProductoOpcion::where('cafeteria_producto_id', $id)->count();
            if($opcionescount > 0){
                $opciones = CafeteriaProductoOpcion::where('cafeteria_producto_id', $id)->get();
            }else{
                $opciones = '';
            }
            return response()->json($opciones);
        }
    }
    public function cafeteriatamanos(Request $request,Hospedaje $hospedaje, $id)
    {
        if ($request->ajax()) {
            $tamañoscount = CafeteriaProductoTamano::where('cafeteria_producto_id', $id)->count();
            if($tamañoscount > 0){
                $tamaños = CafeteriaProductoTamano::where('cafeteria_producto_id', $id)->get();
            }else{
                $tamaños = '';
            }
            return response()->json($tamaños);
        }
    }
    public function cafeteriaproductos(Hospedaje $hospedaje)
    {
        return view('hospedajes.cafeteriaproductos',[
            'hospedaje' => $hospedaje,
            'productos' => CafeteriaProducto::all(),
        ]);
    }
    public function cafeteriaproductosstore(Request $request,Hospedaje $hospedaje)
    {
        $cafeteria = new ReservaCafeteria();
        $cafeteria->cliente_id = NULL;
        $cafeteria->fecha = date('Y-m-d');
        $cafeteria->hora = date('H:i:s');
        $cafeteria->total = $request->get('total_venta');
        $cafeteria->hospedaje_id = $hospedaje->id;
        $cafeteria->save();

        //DETALLE RESERVA
        $producto_id = $request->get('producto_id');
        $cantidad = $request->get('cantidad');
        $precio = $request->get('precio');
        $opcion_id = $request->get('opcion_id');
        $tamaño_id = $request->get('tamaño_id');
        $preciotamaño = $request->get('preciotamaño');

        $cont = 0;

        while ($cont < count($producto_id)) {
            $detalle = new CafeteriaDetalleReserva();
            $detalle->cafeteria_reserva_id = $cafeteria->id;
            $detalle->cafeteria_producto_id = $producto_id[$cont];
            $detalle->precio = $precio[$cont];
            $detalle->cantidad = $cantidad[$cont];
            $detalle->save();

            $detalleproducto = new CafeteriaDetalleReservaProducto();
            $detalleproducto->cafeteria_detalle_reserva_id = $detalle->id;
            $detalleproducto->cafeteria_producto_opciones_id = $opcion_id[$cont];
            $detalleproducto->cafeteria_producto_tamanho_id = $tamaño_id[$cont];
            $detalleproducto->precio_tamanho = $preciotamaño[$cont];
            $detalleproducto->save();

            $cont = $cont + 1;
        }

        return redirect()->route('cafeteria_index')->with('message', 'Guardado con éxito')->with('typealert', 'success');
    }
    public function frigobar(Hospedaje $hospedaje)
    {
        return view('hospedajes.frigobar', [
            'hospedaje' => $hospedaje,
            'productos' => $hospedaje->habitacion->frigobars,
            'detalles' => $hospedaje->detallefrigobars,
        ]);
    }
    public function frigobarstore(Request $request,Hospedaje $hospedaje)
    {
        //DETALLE RESERVA
        $producto_id = $request->get('producto_id');
        $cantidad = $request->get('cantidad');
        $precio = $request->get('precio');
        $nombre = $request->get('nombre');

        $cont = 0;

        while ($cont < count($producto_id)) {
            $detalle = new HospedajeDetalleFrigobar();
            $detalle->hospedaje_id = $hospedaje->id;
            $detalle->nombre = $nombre[$cont];
            $detalle->precio = $precio[$cont];
            $detalle->cantidad = $cantidad[$cont];
            $detalle->save();

            $cont = $cont + 1;
        }
        return redirect()->back()->with('message', 'Guardado con éxito')->with('typealert', 'success');
    }
}