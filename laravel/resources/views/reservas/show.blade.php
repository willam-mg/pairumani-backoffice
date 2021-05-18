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
                        <li class="breadcrumb-item"><a href="{{ route('habitacioncategorias_index') }}">Categorias</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('habitacioncategorias_show',$categoria->id) }}">Categoria: {{ $categoria->nombre }}</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('habitaciones_index',$categoria->id) }}">Habitaciones</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('habitaciones_show',[$categoria->id,$habitacion->id]) }}">Habitacion {{ $habitacion->nombre }}</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('reservas_index',[$categoria->id,$habitacion->id]) }}">Reservas</a></li>
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
                <h4>Reserva {{ $reserva->id }}</h4>
                <hr>
                <table class="table table-striped table-bordered">
                    <tbody>
                        <tr>
                            <th>Checkin</th>
                            <td>{{ $reserva->checkin }}</td>
                        </tr>
                        <tr>
                            <th>Checkout</th>
                            <td>{{ $reserva->checkout }}</td>
                        </tr>
                        <tr>
                            <th>Adultos</th>
                            <td>{{ $reserva->adultos }}</td>
                        </tr>
                        <tr>
                            <th>Niños</th>
                            <td>{!! $reserva->niños !!}</td>
                        </tr>
                        <tr>
                            <th>Cliente</th>
                            <td>{{ $reserva->cliente->nombrecompleto }}</td>
                        </tr>
                        <tr>
                            <th>Habitacion</th>
                            <td>{{ $reserva->habitacion->nombre }}</td>
                        </tr>
                        <tr>
                            <th>Número Habitacion</th>
                            <td>{{ $reserva->habitacion->num_habitacion }}</td>
                        </tr>
                    </tbody>
                </table>
                <div class="form-group text-right">
                    <a class="btn btn-default" href="{{ route('reservas_index',[$categoria->id,$habitacion->id]) }}" title="Cerrar"><i class="material-icons">clear</i> Cerrar</a>
                    <a class="btn btn-warning" href="{{ route('reservas_edit',[$categoria->id,$habitacion->id,$reserva->id]) }}" title="Modificar"><i class="material-icons">edit</i> Modificar</a>                    
                </div>
            </div>
        </div>
    </div>
@endsection