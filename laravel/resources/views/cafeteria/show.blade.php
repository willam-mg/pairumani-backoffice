@extends('layouts.admin')
@section('header')
    <!-- Content Header (Page header) -->
    <h3 class="m-0 text-dark">Detalle Reserva</h3>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-12">
                    <ol class="breadcrumb" style="background-color: inherit">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('cafeteria_index') }}">Reservas Cafeteria</a></li>
                        <li class="breadcrumb-item active">Detalle Reserva</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div>
    </div>
    <!-- /.content-header -->
@endsection
@section('contenido')
    <div class="row">
        <div class="col-md-6 ml-auto mr-auto">
            <div class="card">
                <div class="card-body">
                    <h3 class="title">Reserva {{ $cafeteria->id }}</h3>
                    <hr>
                    <div class="row">
                        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                            <b> Fecha: </b>
                            {{ $cafeteria->fecha.' '.$cafeteria->hora }}
                        </div>
                    </div>
                    <hr>                
                    <div class="row">
                        <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Cliente</th>
                                            <th>Celular</th>
                                            <th>Email</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>{{ $cafeteria->hospedaje ? $cafeteria->hospedaje->cliente->nombrecompleto : $cafeteria->cliente->nombrecompleto }}</td>
                                            <td>{{ $cafeteria->hospedaje ? $cafeteria->hospedaje->cliente->celular : $cafeteria->cliente->celular }}</td>
                                            <td>{{ $cafeteria->hospedaje ? $cafeteria->hospedaje->cliente->email : $cafeteria->cliente->email }}</td>
                                        </tr>                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                            <label for="detalle">Detalle Productos</label>
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered">
                                    <thead>
                                        <th>Producto</th>
                                        <th>Precio P.</th>
                                        <th>Opcion</th>
                                        <th>Tamaño</th>
                                        <th>Precio T.</th>
                                        <th>Cantidad</th>
                                        <th>Subtotal</th>
                                    </thead>
                                    <tbody>
                                        @foreach($cafeteria->detalles as $detalle)
                                            <tr>
                                                <td>{{ $detalle->producto->nombre }}</td>
                                                <td>{{ env('MONEYLOCAL') }} {{ number_format($detalle->precio,2) }}</td>
                                                <td>{{ $detalle->detalleproducto->opcion->nombre }}</td>
                                                <td>{{ $detalle->detalleproducto->tamaño->nombre }}</td>
                                                <td>{{ env('MONEYLOCAL') }} {{ number_format($detalle->detalleproducto->precio_tamanho,2) }}</td>
                                                <td>{{ $detalle->cantidad }}</td>
                                                <td>{{ env('MONEYLOCAL') }} {{ number_format(($detalle->precio+$detalle->detalleproducto->precio_tamanho)*$detalle->cantidad,2) }}</td>
                                            </tr>                                        
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th colspan="6"></th>
                                            <th>
                                                <h4 id="total">
                                                    <b>
                                                        Total: {{ env('MONEYLOCAL') }} {{ number_format($cafeteria->total,2) }}
                                                    </b>
                                                </h4>
                                            </th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>                          
                            <div class="form-group text-right">
                                <a href="{{ route('cafeteria_index') }}" class="btn btn-default">
                                    <i class="material-icons">clear</i> Cerrar
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>        
        </div>
    </div>
@endsection