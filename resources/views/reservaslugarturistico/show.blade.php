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
                        <li class="breadcrumb-item"><a href="{{ route('lugaresturisticos_index') }}">Lugares Turisticos</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('lugaresturisticos_show',$lugar->id) }}">Lugar Turistico: {{ $lugar->nombre }}</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('reservaslugaresturisticos_index',$lugar->id) }}">Reservas</a></li>
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
                            <th>Cliente</th>
                            <td>{{ $reserva->hospedaje ? $reserva->hospedaje->cliente->nombrecompleto : $reserva->cliente->nombrecompleto }}</td>
                        </tr>
                        <tr>
                            <th>Fecha</th>
                            <td>{{ $reserva->fecha }}</td>
                        </tr>
                        <tr>
                            <th>Lugar Turistico</th>
                            <td>{{ $reserva->lugarturistico->nombre }}</td>
                        </tr>
                        <tr>
                            <th>Hospedaje</th>
                            <td>{{ $reserva->hospedaje ? $reserva->hospedaje->id : '(ND)' }}</td>
                        </tr>
                        <tr>
                            <th>Precio</th>
                            <td>{{ $reserva->precio }}</td>
                        </tr>
                        <tr>
                            <th>Estado</th>
                            <td>{{ $reserva->estado }}</td>
                        </tr>
                    </tbody>
                </table>
                <div class="form-group text-right">
                    <a class="btn btn-default" href="{{ route('reservaslugaresturisticos_index',$lugar->id) }}" title="Cerrar"><i class="material-icons">clear</i> Cerrar</a>
                    @if(!$reserva->hospedaje)
                        @if(kvfj(Auth::user()->rol->permisos,'reservaslugaresturisticos_edit'))
                            <a class="btn btn-warning" href="{{ route('reservaslugaresturisticos_edit',[$lugar->id,$reserva->id]) }}" title="Modificar"><i class="material-icons">edit</i> Modificar</a>
                        @endif
                    @endif                    
                </div>
            </div>
        </div>
    </div>
@endsection