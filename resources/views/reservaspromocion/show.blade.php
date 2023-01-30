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
                        <li class="breadcrumb-item"><a href="{{ route('promociones_index') }}">Promociones</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('promociones_show',$promocion->id) }}">Promocion: {{ $promocion->nombre }}</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('promocionreservas_index',$promocion->id) }}">Reservas</a></li>
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
                    <a class="btn btn-default" href="{{ route('promocionreservas_index',$promocion->id) }}" title="Cerrar"><i class="material-icons">clear</i> Cerrar</a>
                    @if(kvfj(Auth::user()->rol->permisos,'promocionreservas_edit'))
                        <a class="btn btn-warning" href="{{ route('promocionreservas_edit',[$promocion->id,$reserva->id]) }}" title="Modificar"><i class="material-icons">edit</i> Modificar</a>
                    @endif                   
                </div>
            </div>
        </div>
    </div>
@endsection