@extends('layouts.admin')
@section('header')
    <!-- Content Header (Page header) -->
    <h3 class="m-0 text-dark">Detalle Hospedaje</h3>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-12">
                    <ol class="breadcrumb" style="background-color: inherit">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('hospedajes_index') }}">Hospedajes</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('hospedajes_show',$hospedaje->id) }}">Hospedaje {{ $hospedaje->id }}</a></li>
                        <li class="breadcrumb-item active">Detalle Hospedaje</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div>
    </div>
    <!-- /.content-header -->
@endsection
@section('contenido')
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h4>Hospedaje {{ $hospedaje->id }}</h4>
                    <hr>
                    <table class="table table-striped table-bordered">
                        <tbody>
                            <tr>
                                <th>Checkin</th>
                                <td>{{ $hospedaje->fecha_checkin }}</td>
                            </tr>
                            <tr>
                                <th>Checkout</th>
                                <td>{{ $hospedaje->fecha_checkout }}</td>
                            </tr>
                            <tr>
                                <th>Niños</th>
                                <td>{{ $hospedaje->niños }}</td>
                            </tr>
                            <tr>
                                <th>Adultos</th>
                                <td>{{ $hospedaje->adultos }}</td>
                            </tr>
                            <tr>
                                <th>Precio</th>
                                <td>{{ $hospedaje->precio }}</td>
                            </tr>
                            <tr>
                                <th>Precio Promocion</th>
                                <td>{{ $hospedaje->precio_promocion }}</td>
                            </tr>
                        </tbody>
                    </table>
                    {{-- <div class="form-group text-right">
                        <a class="btn btn-default" href="{{ route('hospedajes_index') }}" title="Cerrar"><i class="material-icons">clear</i> Cerrar</a>
                        <a class="btn btn-warning" href="{{ route('hospedajes_edit',$hospedaje->id) }}" title="Modificar"><i class="material-icons">edit</i> Modificar</a>                    
                    </div> --}}
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h4>Cliente {{ $hospedaje->cliente->id }}</h4>
                    <hr>
                    <table class="table table-striped table-bordered">
                        <tbody>
                            <tr>
                                <th>Cliente</th>
                                <td>{{ $hospedaje->cliente->nombres .' '. $hospedaje->cliente->apellidos }}</td>
                            </tr>
                            <tr>
                                <th>Celular</th>
                                <td>{{ $hospedaje->cliente->celular }}</td>
                            </tr>
                            <tr>
                                <th>Pais</th>
                                <td>{{ $hospedaje->cliente->pais }}</td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td>{{ $hospedaje->cliente->email }}</td>
                            </tr>
                            <tr>
                                <th>Telefono</th>
                                <td>{{ $hospedaje->cliente->telefono }}</td>
                            </tr>
                            <tr>
                                <th>Oficio</th>
                                <td>{{ $hospedaje->cliente->oficio }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h4>Habitación {{ $hospedaje->habitacion->id }}</h4>
                    <hr>
                    <table class="table table-striped table-bordered">
                        <tbody>
                            <tr>
                                <th>Nombre</th>
                                <td>{{ $hospedaje->habitacion->nombre }}</td>
                            </tr>
                            <tr>
                                <th>Número Habitación</th>
                                <td>{{ $hospedaje->habitacion->num_habitacion }}</td>
                            </tr>
                            <tr>
                                <th>Capacidad Minima</th>
                                <td>{{ $hospedaje->habitacion->capacidad_minima }}</td>
                            </tr>
                            <tr>
                                <th>Capacidad Maxima</th>
                                <td>{{ $hospedaje->habitacion->capacidad_maxima }}</td>
                            </tr>
                            <tr>
                                <th>Descripcion</th>
                                <td>{!! $hospedaje->habitacion->descripcion !!}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>        
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h4>Acompañantes</h4>
                    <hr>
                    <table class="table table-bordered">
                        <thead class="thead-dark">
                            <tr>
                                <th>Nombre</th>
                                <th>Número Documento</th>
                                <th>Nacionalidad</th>
                                <th>Ciudad</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($hospedaje->detalleacompanantes))
                                @foreach($hospedaje->detalleacompanantes as $acompañante)
                                    <tr>
                                        <td>{{ $acompañante->nombre }}</td>
                                        <td>{{ $acompañante->num_documento }}</td>
                                        <td>{{ $acompañante->nacionalidad }}</td>
                                        <td>{{ $acompañante->ciudad }}</td>
                                    </tr>                                            
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="4" style="text-align: center;">
                                        <h2><span class="badge badge-danger" style="font-size: 20px">No Existen acomapñantes</span></h2>
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>        
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h4>Transportes Reservados</h4>
                    <hr>
                    <table class="table table-bordered">
                        <thead class="thead-dark">
                            <tr>
                                <th>Transporte</th>
                                <th>Precio</th>
                                <th>Descripcion</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($hospedaje->detalletransportes))
                                @foreach($hospedaje->detalletransportes as $detalle)
                                    <tr>
                                        <td>{{ $detalle->transporte->nombre }}</td>
                                        <td>{{ env('MONEYLOCAL') }}{{ number_format($detalle->transporte->precio,2) }}</td>
                                        <td>{!! $detalle->transporte->descripcion !!}</td>
                                    </tr>                                            
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="3" style="text-align: center;">
                                        <h2><span class="badge badge-danger" style="font-size: 20px">No Existen transportes</span></h2>
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h4>Productos Reservados</h4>
                    <hr>
                    <table class="table table-bordered">
                        <thead class="thead-dark">
                            <tr>
                                <th>Producto</th>
                                <th>Fecha</th>
                                <th>Precio P.</th>
                                <th>Opcion</th>
                                <th>Tamaño</th>
                                <th>Tamaño P.</th>
                                <th>Cantidad</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($hospedaje->restaurantes))
                                @foreach($hospedaje->restaurantes as $detalle)
                                    <tr>
                                        <td>{{ $detalle->detalle->producto->nombre }}</td>
                                        <td>{{ $detalle->fecha }}</td>
                                        <td>{{ env('MONEYLOCAL') }}{{ number_format($detalle->detalle->precio,2) }}</td>
                                        <td>{{ $detalle->detalle->detalleproducto->opcion->nombre }}</td>
                                        <td>{{ $detalle->detalle->detalleproducto->tamaño->nombre }}</td>
                                        <td>{{ env('MONEYLOCAL') }}{{ number_format($detalle->detalle->detalleproducto->precio_tamanho,2) }}</td>
                                        <td>{{ $detalle->detalle->cantidad }}</td>
                                    </tr>                                            
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="7" style="text-align: center;">
                                        <h2><span class="badge badge-danger" style="font-size: 20px">No Existen productos</span></h2>
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h4>Productos Cafeteria Reservados</h4>
                    <hr>
                    <table class="table table-bordered">
                        <thead class="thead-dark">
                            <tr>
                                <th>Producto</th>
                                <th>Fecha</th>
                                <th>Precio P.</th>
                                <th>Opcion</th>
                                <th>Tamaño</th>
                                <th>Tamaño P.</th>
                                <th>Cantidad</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($hospedaje->cafeterias))
                                @foreach($hospedaje->cafeterias as $detalle)
                                    <tr>
                                        <td>{{ $detalle->detalle->producto->nombre }}</td>
                                        <td>{{ $detalle->fecha }}</td>
                                        <td>{{ env('MONEYLOCAL') }}{{ number_format($detalle->detalle->precio,2) }}</td>
                                        <td>{{ $detalle->detalle->detalleproducto->opcion->nombre }}</td>
                                        <td>{{ $detalle->detalle->detalleproducto->tamaño->nombre }}</td>
                                        <td>{{ env('MONEYLOCAL') }}{{ number_format($detalle->detalle->detalleproducto->precio_tamanho,2) }}</td>
                                        <td>{{ $detalle->detalle->cantidad }}</td>
                                    </tr>                                            
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="7" style="text-align: center;">
                                        <h2><span class="badge badge-danger" style="font-size: 20px">No Existen productos</span></h2>
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h4>Productos Frigobar</h4>
                    <table class="table table-bordered">
                        <thead class="thead-dark">
                            <tr>
                                <th>Nombre</th>
                                <th>Precio</th>
                                <th>Cantidad</th>
                                <th>SubTotal</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <td colspan="3"><b>TOTAL</b></td>
                                <td>
                                    {{ env('MONEYLOCAL') }}
                                    {{ number_format($hospedaje->totalfrigobar(),2) }}
                                </td>
                            </tr>
                        </tfoot>
                        <tbody>
                            @if(count($hospedaje->detallefrigobars))
                                @foreach($hospedaje->detallefrigobars as $detalle)
                                    <tr>
                                        <td>{{ $detalle->nombre }}</td>
                                        <td>{{ $detalle->precio }}</td>
                                        <td>{{ $detalle->cantidad }}</td>
                                        <td>{{ number_format($detalle->cantidad * $detalle->precio) }}</td>
                                    </tr>                                            
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="4" style="text-align: center;">
                                        <h2><span class="badge badge-danger" style="font-size: 20px">No Existen productos</span></h2>
                                    </td>
                                </tr>                                        
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h4>Lugares Turisticos Reservados</h4>
                    <hr>
                    <table class="table table-bordered">
                        <thead class="thead-dark">
                            <tr>
                                <th>Cliente</th>
                                <th>Lugar Turistico</th>
                                <th>Fecha</th>
                                <th>Precio</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($hospedaje->lugares))
                                @foreach($hospedaje->lugares as $lugar)
                                    <tr>
                                        <td>{{ $hospedaje->cliente->nombrecompleto }}</td>
                                        <td>{{ $lugar->lugarturistico->nombre }}</td>
                                        <td>{{ $lugar->fecha }}</td>
                                        <td>{{ env('MONEYLOCAL') }}{{ number_format($lugar->precio,2) }}</td>
                                    </tr>                                            
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="4" style="text-align: center;">
                                        <h2><span class="badge badge-danger" style="font-size: 20px">No Existen lugares turisticos</span></h2>
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h4>Total a pagar</h4>
                    <hr>
                    <table class="table table-bordered">
                        <thead class="thead-dark">
                            <tr>
                                <th>Hospedaje</th>
                                <th>Transportes</th>
                                <th>Productos</th>
                                <th>Productos Cafeteria</th>
                                <th>Productos Frigobar</th>
                                <th>Lugares Turisticos</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr class="text-center">
                                <td colspan="5"><b>TOTAL</b></td>
                                <td>
                                    {{ env('MONEYLOCAL') }}
                                    {{ number_format($hospedaje->total(),2) }}
                                </td>
                            </tr>
                        </tfoot>
                        <tbody>
                            <tr>
                                <td>{{ env('MONEYLOCAL') }}{{ number_format($hospedaje->precio_promocion ? $hospedaje->precio_promocion : $hospedaje->precio,2) }}</td>
                                <td>{{ env('MONEYLOCAL') }}{{ number_format(pageTotal($hospedaje->detalletransportes,'precio'),2) }}</td>
                                <td>{{ env('MONEYLOCAL') }}{{ number_format(pageTotal($hospedaje->restaurantes,'total'),2) }}</td>
                                <td>{{ env('MONEYLOCAL') }}{{ number_format(pageTotal($hospedaje->cafeterias,'total'),2) }}</td>
                                <td>{{ env('MONEYLOCAL') }}{{ number_format($hospedaje->totalfrigobar(),2) }}</td>
                                <td>{{ env('MONEYLOCAL') }}{{ number_format(pageTotal($hospedaje->lugares,'precio'),2) }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection