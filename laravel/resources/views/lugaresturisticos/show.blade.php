@extends('layouts.admin')
@section('header')
    <!-- Content Header (Page header) -->
    <h3 class="m-0 text-dark">Detalle Lugar Turistico</h3>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-12">
                    <ol class="breadcrumb" style="background-color: inherit">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('lugaresturisticos_index') }}"></a>Lugares Turisticos</li>
                        <li class="breadcrumb-item active">Detalle Lugar Turistico</li>
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
                <h4>Lugar Turistico {{ $lugar->id }}</h4>
                <hr>
                <table class="table table-striped table-bordered">
                    <tbody>
                        <tr>
                            <th>Nombre</th>
                            <td>{{ $lugar->nombre }}</td>
                        </tr>
                        <tr>
                            <th>Descripcion</th>
                            <td>{!! $lugar->descripcion !!}</td>
                        </tr>
                        <tr>
                            <th>Latitud</th>
                            <td>{{ $lugar->lat }}</td>
                        </tr>
                        <tr>
                            <th>Longitud</th>
                            <td>{{ $lugar->lng }}</td>
                        </tr>
                        <tr>
                            <th>Foto</th>
                            <td>
                                <img src="{{ $lugar->fotourl }}" alt="{{ $lugar->nombre }}" width="200px" height="200px">
                            </td>
                        </tr>
                        <tr>
                            <th>Precio Recorrido</th>
                            <td>{{ $lugar->precio_recorrido }}</td>
                        </tr>
                    </tbody>
                </table>
                <div class="form-group text-right">
                    <a class="btn btn-default" href="{{ route('lugaresturisticos_index') }}" title="Cerrar"><i class="material-icons">clear</i> Cerrar</a>
                    <a class="btn btn-warning" href="{{ route('lugaresturisticos_edit',$lugar->id) }}" title="Modificar"><i class="material-icons">edit</i> Modificar</a>                    
                </div>
            </div>
        </div>
    </div>
@endsection