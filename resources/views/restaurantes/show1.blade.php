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
                        <li class="breadcrumb-item"><a href="{{ route('restaurantes_index') }}">Reservas Restaurante</a></li>
                        <li class="breadcrumb-item active">Detalle Reserva</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div>
    </div>
    <!-- /.content-header -->
@endsection
@section('contenido')
    <div class="col-md-6 ml-auto mr-auto">
        <div class="card">
            <div class="card-body">
                <h4>Reserva {{ $restaurante->id }}</h4>
                <hr>
                <table class="table table-striped table-bordered">
                    <tbody>
                        <tr>
                            <th>Cliente</th>
                            <td>{{ $restaurante->hospedaje ? $restaurante->hospedaje->cliente->nombrecompleto : $restaurante->cliente->nombrecompleto }}</td>
                        </tr>
                        <tr>
                            <th>Fecha</th>
                            <td>{{ $restaurante->fecha }}</td>
                        </tr>
                        <tr>
                            <th>Hora</th>
                            <td>{{ $restaurante->hora }}</td>
                        </tr>
                        <tr>
                            <th>Producto</th>
                            <td>{{ $restaurante->detalle->producto->nombre }}</td>
                        </tr>
                        <tr>
                            <th>Precio Producto</th>
                            <td>{{ env('MONEYLOCAL') }} {{ number_format($restaurante->detalle->precio,2) }}</td>
                        </tr>
                        <tr>
                            <th>Opcion</th>
                            <td>{{ $restaurante->detalle->detalleproducto->opcion->nombre }}</td>
                        </tr>
                        <tr>
                            <th>Tamaño</th>
                            <td>{{ $restaurante->detalle->detalleproducto->tamaño->nombre }}</td>
                        </tr>
                        <tr>
                            <th>Precio Tamaño</th>
                            <td>{{ env('MONEYLOCAL') }} {{ number_format($restaurante->detalle->detalleproducto->tamaño->precio,2) }}</td>
                        </tr>
                        <tr>
                            <th>Cantidad</th>
                            <td>{{ $restaurante->detalle->cantidad }}</td>
                        </tr>
                        <tr>
                            <th>Total</th>
                            <td>{{ env('MONEYLOCAL') }} {{ number_format($restaurante->total,2) }}</td>
                        </tr>
                    </tbody>
                </table>
                <div class="form-group text-right">
                    <a class="btn btn-default" href="{{ route('restaurantes_index') }}" title="Cerrar"><i class="material-icons">clear</i> Cerrar</a>
                </div>
            </div>
        </div>
    </div>
@endsection