@extends('layouts.admin')
@section('header')
    <!-- Content Header (Page header) -->
    <h3 class="m-0 text-dark">Reserva hospedaje</h3>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-12">
                    <ol class="breadcrumb" style="background-color: inherit">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('habitacioncategorias_index') }}">Categorias</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('habitacioncategorias_show',$categoria->id) }}">Categoria: {{ $categoria->nombre }}</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('habitaciones_index') }}">Habitaciones</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('habitaciones_show',[$habitacion->id]) }}">Habitacion {{ $habitacion->nombre }}</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('reservas_index',[$habitacion->id]) }}">Reservas</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('reservas_show',[$habitacion->id,$reserva->id]) }}">Reserva {{ $reserva->id }}</a></li>
                        <li class="breadcrumb-item active">Reserva hospedaje</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div>
    </div>
    <!-- /.content-header -->
@endsection
@section('contenido')
    <form method="POST" action="{{ route('reservas_hospedaje',[$categoria->id,$habitacion->id,$reserva->id]) }}">
        @csrf
        <div class="row">
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="card">
                    <div class="card-header bg-info">
                        <h3>Detalle información Hospedaje:</h3>
                    </div>
                    <div class="card-body">
                        <div class="row" style="font-size: 20px">
                            <div class="col-lg-7 col-sm-7 col-md-7 col-xs-12">
                                <h3 class="card-title"><b>Cliente:</b></h3>
                                <b>Nombres y Apellidos:</b> {{ $reserva->cliente->nombrecompleto }}<br>
                                <b>Email:</b> {{ $reserva->cliente->email }} <br>
                                <b>Telefonos:</b> {{ $reserva->cliente->telefono }} - {{ $reserva->cliente->celular }} <br>
                                <b>Tipo Documento:</b> {{ $reserva->cliente->tipo_documento }} <br>
                                <b>Número Documento:</b> {{ $reserva->cliente->num_documento }} <br>
                                <b>Pais:</b> {{ $reserva->cliente->pais }} <br>
                                <b>Ciudad:</b> {{ $reserva->cliente->ciudad }} <br><br><br>
                            </div>
                            <div class="col-lg-5 col-sm-5 col-md-5 col-xs-12">                    
                                <h3 class="card-title"><b>Habitación</b></h3>
                                <b>Nombre:</b> {{ $reserva->habitacion->nombre }}<br>
                                <b>Número Habitacion:</b> {{ $reserva->habitacion->num_habitacion }} <br>
                                <b>Precio:</b> {{ $reserva->habitacion->precio }} <br>
                            </div>
                            @if($reserva->habitacion->promocion != NULL)
                                @if($reserva->habitacion->promocion->estado == 'Activo')
                                    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                        <h3 class="card-title"><b>Promoción:</b></h3>
                                        <b>Promoción:</b> {{ $reserva->habitacion->promocion->nombre }}<br>
                                        <b>Descripción:</b> {!! $reserva->habitacion->promocion->descripcion !!} <br>
                                        <b>Precio:</b> {{ $reserva->habitacion->promocion->precio }} <br>
                                    </div>
                                @endif
                            @endif
                            <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                                <h3 class="card-title"><b>Reserva:</b></h3>
                                <b>Checkin:</b> {{ $reserva->checkin }}<br>
                                <b>Checkout:</b> {{ $reserva->checkout }} <br>
                                <b>Adultos:</b> {{ $reserva->adultos }} <br>
                                <b>Niños:</b> {{ $reserva->niños }} <br><br>
                            </div>
                            <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                                <button class="btn btn-primary" type="submit">
                                    <i class="material-icons">save</i> Guardar
                                </button>
                                <a href="{{ route('reservas_index',[$habitacion->id]) }}" class="btn btn-danger">
                                    <i class="material-icons">clear</i> Cancelar
                                </a><br><br>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="card">
                    <div class="card-header bg-info">
                        <h3>Acompañantes:</h3>
                    </div>
                    <div class="card-body">
                        <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                            <div class="col-lg-4 col-sm-4 col-md-4 col-xs-4">
                                <div class="form-group">
                                    <a class="btn btn-success" href="{{ route('acompanantes_create',[$reserva->cliente->id,$tipo,$categoria->id,$habitacion->id,$reserva->id]) }}" style="margin-top: 25px">Nuevo Acompañante</a>
                                </div>
                            </div>
                            <table id="detalles" class="table table-striped table-bordered table-condensed table-hover text-center">
                                <thead>
                                    <tr>
                                        <th>Acompañante</th>
                                        <th>Nacionalidad</th>
                                        <th>Ciudad</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($acompañantes as $acompañante)
                                        <tr>
                                            <td>{{ $acompañante->nombre }}</td>
                                            <td>{{ $acompañante->nacionalidad }}</td>
                                            <td>{{ $acompañante->ciudad }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection