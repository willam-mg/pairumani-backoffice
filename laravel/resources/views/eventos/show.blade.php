@extends('layouts.admin')
@section('header')
    <!-- Content Header (Page header) -->
    <h3 class="m-0 text-dark">Detalle Evento</h3>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-12">
                    <ol class="breadcrumb" style="background-color: inherit">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('eventos_index') }}"></a>Eventos</li>
                        <li class="breadcrumb-item active">Detalle Evento</li>
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
                <h4>Evento {{ $evento->id }}</h4>
                <hr>
                <table class="table table-striped table-bordered">
                    <tbody>
                        <tr>
                            <th>Nombre</th>
                            <td>{{ $evento->nombre }}</td>
                        </tr>
                        <tr>
                            <th>Descripcion</th>
                            <td>{!! $evento->descripcion !!}</td>
                        </tr>
                        <tr>
                            <th>Foto</th>
                            <td>
                                <img src="{{ $evento->fotourl }}" alt="{{ $evento->nombre }}" width="250px" height="200px">
                            </td>
                        </tr>
                        <tr>
                            <th>Fecha</th>
                            <td>{{ $evento->fecha }}</td>
                        </tr>
                    </tbody>
                </table>
                <div class="form-group text-right">
                    <a class="btn btn-default" href="{{ route('eventos_index') }}" title="Cerrar"><i class="material-icons">clear</i> Cerrar</a>
                    <a class="btn btn-warning" href="{{ route('eventos_edit',$evento->id) }}" title="Modificar"><i class="material-icons">edit</i> Modificar</a>                    
                </div>
            </div>
        </div>
    </div>
@endsection