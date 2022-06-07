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
                        <li class="breadcrumb-item"><a href="{{ route('habitacioncategorias_index') }}">Categorias</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('habitacioncategorias_show',$categoria->id) }}">Categoria: {{ $categoria->nombre }}</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('habitaciones_index',$categoria->id) }}">Habitaciones</a></li>
                        <li class="breadcrumb-item active">Detalle Habitacion</li>
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
                <h4>Habitacion {{ $habitacion->id }}</h4>
                <hr>
                <table class="table table-striped table-bordered">
                    <tbody>
                        <tr>
                            <th>Nombre</th>
                            <td>{{ $habitacion->nombre }}</td>
                        </tr>
                        <tr>
                            <th>Num habitacion</th>
                            <td>{{ $habitacion->num_habitacion }}</td>
                        </tr>
                        <tr>
                            <th>Categoria</th>
                            <td>{{ $habitacion->categoria->nombre }}</td>
                        </tr>
                        <tr>
                            <th>Foto</th>
                            <td>
                                <img src="{{ $habitacion->fotourl }}" alt="{{ $habitacion->nombre }}" width="200px" height="200px">
                            </td>
                        </tr>
                        <tr>
                            <th>Descripcion</th>
                            <td>{!! $habitacion->descripcion !!}</td>
                        </tr>
                        <tr>
                            <th>Precio</th>
                            <td>{{ $habitacion->precio }}</td>
                        </tr>
                        <tr>
                            <th>Capacidad Minima</th>
                            <td>{{ $habitacion->capacidad_minima }}</td>
                        </tr>
                        <tr>
                            <th>Estado</th>
                            <td>{{ $habitacion->estado }}</td>
                        </tr>
                    </tbody>
                </table>
                <div class="form-group text-right">
                    <a class="btn btn-default" href="{{ route('habitaciones_index',$categoria->id) }}" title="Cerrar"><i class="material-icons">clear</i> Cerrar</a>
                    @if(kvfj(Auth::user()->rol->permisos,'habitaciones_edit'))
                        <a class="btn btn-warning" href="{{ route('habitaciones_edit',[$categoria->id,$habitacion->id]) }}" title="Modificar"><i class="material-icons">edit</i> Modificar</a>  
                    @endif                  
                </div>
            </div>
        </div>
    </div>
@endsection