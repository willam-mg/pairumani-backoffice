@extends('layouts.admin')
@section('header')
    <!-- Content Header (Page header) -->
    <h3 class="m-0 text-dark">Detalle Habitacion</h3>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-12">
                    <ol class="breadcrumb" style="background-color: inherit">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('habitaciones_index') }}">Habitaciones</a></li>
                        <li class="breadcrumb-item active">Detalle Habitacion</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div>
    </div>
    <!-- /.content-header -->
@endsection
@section('contenido')
    
    <div class="card">
        <div class="card-body">
            <h4>Habitacion {{ $habitacion->id }}</h4>
            <hr>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-4">
                    @include('habitaciones._habitacion_info')
                </div>
                <div class="col-xs-12 col-sm-12 col-md-8">
                    <ul class="nav nav-pills nav-justified">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{ route('habitacionfrigobar_index',[$habitacion->id]) }}">
                                productos refrigerador
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Much longer nav link</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Link</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                        </li>
                    </ul>


                    @if(kvfj(Auth::user()->rol->permisos,'habitacionfrigobar_index'))
                    <a href="{{ route('habitacionfrigobar_index',[$habitacion->id]) }}" class="btn btn-warning btn-round btn-just-icon"
                        title="Habitacion frigobar">
                        <i class="material-icons">kitchen</i>
                    </a>
                    @endif
                    @if(kvfj(Auth::user()->rol->permisos,'reservas_index'))
                    <a href="{{ route('reservas_index',[$habitacion->id]) }}" class="btn btn-primary btn-round btn-just-icon"
                        title="Reserva Habitacion">
                        <i class="material-icons">pending_actions</i>
                    </a>
                    @endif
                    @if(kvfj(Auth::user()->rol->permisos,'habitaciones_galeria'))
                    <a href="{{ route('habitaciones_galeria',[$habitacion->id]) }}" class="btn btn-success btn-round btn-just-icon"
                        title="Galeria habitacion">
                        <i class="material-icons">photo_size_select_actual</i>
                    </a>
                    @endif
                </div>
            </div>
            
            <div class="form-group text-right">
                <a class="btn btn-default" href="{{ route('habitaciones_index') }}" title="Cerrar"><i class="material-icons">clear</i> Cerrar</a>
                @if(kvfj(Auth::user()->rol->permisos,'habitaciones_edit'))
                    <a class="btn btn-warning" href="{{ route('habitaciones_edit',[$habitacion->id]) }}" title="Modificar"><i class="material-icons">edit</i> Modificar</a>  
                @endif                  
            </div>
        </div>
    </div>
    
    
@endsection