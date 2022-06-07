@extends('layouts.admin')
@section('header')
    <!-- Content Header (Page header) -->
    <h3 class="m-0 text-dark">Detalle producto frigobar</h3>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-12">
                    <ol class="breadcrumb" style="background-color: inherit">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('habitacioncategorias_index') }}">Categorias</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('habitacioncategorias_show',$categoria->id) }}">Categoria: {{ $categoria->nombre }}</a></li>
						<li class="breadcrumb-item"><a href="{{ route('habitaciones_index',$categoria->id) }}">Habitaciones</a></li>
						<li class="breadcrumb-item"><a href="{{ route('habitaciones_index',[$categoria->id,$habitacion->id]) }}">Habitacion: {{ $habitacion->nombre }}</a></li>
                        <li class="breadcrumb-item active">Detalle producto frigobar</li>
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
                <h4>Frigobar {{ $frigobar->id }}</h4>
                <hr>
                <table class="table table-striped table-bordered">
                    <tbody>
                        <tr>
                            <th>Nombre</th>
                            <td>{{ $frigobar->nombre }}</td>
                        </tr>
                        <tr>
                            <th>Precio</th>
                            <td>{{ $frigobar->precio }}</td>
                        </tr>
                        <tr>
                            <th>Habitacion</th>
                            <td>{{ $frigobar->habitacion->nombre }}</td>
                        </tr>
                    </tbody>
                </table>
                <div class="form-group text-right">
                    <a class="btn btn-default" href="{{ route('habitacionfrigobar_index',[$categoria->id,$habitacion->id]) }}" title="Cerrar"><i class="material-icons">clear</i> Cerrar</a>
                    @if(kvfj(Auth::user()->rol->permisos,'habitaciones_edit'))
                        <a class="btn btn-warning" href="{{ route('habitacionfrigobar_edit',[$categoria->id,$habitacion->id,$frigobar->id]) }}" title="Modificar"><i class="material-icons">edit</i> Modificar</a>  
                    @endif                  
                </div>
            </div>
        </div>
    </div>
@endsection