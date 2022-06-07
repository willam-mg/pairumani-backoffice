@extends('layouts.admin')
@section('header')
    <!-- Content Header (Page header) -->
    <h3 class="m-0 text-dark">Detalle Tamaño {{ $tamano->nombre }}</h3>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-12">
                    <ol class="breadcrumb" style="background-color: inherit">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('restaurantecategorias_index') }}">Categorias</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('restaurantecategorias_show',$categoria->id) }}">Categoria: {{ $categoria->nombre }}</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('productos_index',$categoria->id) }}">Productos</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('productos_show',[$categoria->id,$producto->id]) }}">Producto: {{ $producto->nombre }}</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('tamanos_index',[$categoria->id,$producto->id]) }}">Tamaños</a></li>
                        <li class="breadcrumb-item active">Detalle Tamaño</li>
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
                <h4>Opcion {{ $tamano->id }}</h4>
                <hr>
                <table class="table table-striped table-bordered">
                    <tbody>
                        <tr>
                            <th>Nombre</th>
                            <td>{{ $tamano->nombre }}</td>
                        </tr>
                        <tr>
                            <th>Precio</th>
                            <td>{{ $tamano->precio }}</td>
                        </tr>
                        <tr>
                            <th>Producto</th>
                            <td>{{ $tamano->producto->nombre }}</td>
                        </tr>
                    </tbody>
                </table>
                <div class="form-group text-right">
                    <a class="btn btn-default" href="{{ route('tamanos_index',[$categoria->id,$producto->id]) }}" title="Cerrar"><i class="material-icons">clear</i> Cerrar</a>
                    @if(kvfj(Auth::user()->rol->permisos,'tamanos_edit'))
                        <a class="btn btn-warning" href="{{ route('tamanos_edit',[$categoria->id,$producto->id,$tamano->id]) }}" title="Modificar"><i class="material-icons">edit</i> Modificar</a>
                    @endif                    
                </div>
            </div>
        </div>
    </div>
@endsection