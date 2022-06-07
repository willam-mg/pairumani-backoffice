@extends('layouts.admin')
@section('header')
    <!-- Content Header (Page header) -->
    <h3 class="m-0 text-dark">Detalle Promocion</h3>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-12">
                    <ol class="breadcrumb" style="background-color: inherit">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('promociones_index') }}">Promociones</a></li>
                        <li class="breadcrumb-item active">Detalle Promocion</li>
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
                <h4>Promocion {{ $promocion->id }}</h4>
                <hr>
                <table class="table table-striped table-bordered">
                    <tbody>
                        <tr>
                            <th>Nombre</th>
                            <td>{{ $promocion->nombre }}</td>
                        </tr>
                        <tr>
                            <th>Descripcion</th>
                            <td>{!! $promocion->descripcion !!}</td>
                        </tr>
                        <tr>
                            <th>Foto</th>
                            <td>
                                <img src="{{ $promocion->fotourl }}" alt="{{ $promocion->nombre }}" width="250px" height="200px">
                            </td>
                        </tr>
                        <tr>
                            <th>Precio</th>
                            <td>{{ $promocion->precio }}</td>
                        </tr>
                        <tr>
                            <th>Estado</th>
                            <td>{{ $promocion->estado }}</td>
                        </tr>
                    </tbody>
                </table>
                <div class="form-group text-right">
                    <a class="btn btn-default" href="{{ route('promociones_index') }}" title="Cerrar"><i class="material-icons">clear</i> Cerrar</a>
                    @if(kvfj(Auth::user()->rol->permisos,'promociones_edit'))
                        <a class="btn btn-warning" href="{{ route('promociones_edit',$promocion->id) }}" title="Modificar"><i class="material-icons">edit</i> Modificar</a>  
                    @endif                  
                </div>
            </div>
        </div>
    </div>
@endsection