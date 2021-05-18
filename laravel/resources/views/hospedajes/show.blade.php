@extends('layouts.admin')
@section('header')
    <!-- Content Header (Page header) -->
    <h3 class="m-0 text-dark">Detalle Acompañante</h3>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-12">
                    <ol class="breadcrumb" style="background-color: inherit">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('acompanantes_index') }}"></a>acompanantes</li>
                        <li class="breadcrumb-item active">Detalle Acompañante</li>
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
                <h4>Acompañante {{ $acompanante->id }}</h4>
                <hr>
                <table class="table table-striped table-bordered">
                    <tbody>
                        <tr>
                            <th>Nombre</th>
                            <td>{{ $acompanante->nombre }}</td>
                        </tr>
                        <tr>
                            <th>Tipo Documento</th>
                            <td>{{ $acompanante->tipo_documento }}</td>
                        </tr>
                        <tr>
                            <th>Num Documento</th>
                            <td>{{ $acompanante->num_documento }}</td>
                        </tr>
                        <tr>
                            <th>Nacionalidad</th>
                            <td>{{ $acompanante->nacionalidad }}</td>
                        </tr>
                        <tr>
                            <th>Fecha Nacimiento</th>
                            <td>{{ $acompanante->fecha_nacimiento }}</td>
                        </tr>
                        <tr>
                            <th>Ciudad</th>
                            <td>{{ $acompanante->ciudad }}</td>
                        </tr>
                    </tbody>
                </table>
                <div class="form-group text-right">
                    <a class="btn btn-default" href="{{ route('acompanantes_index') }}" title="Cerrar"><i class="material-icons">clear</i> Cerrar</a>
                    <a class="btn btn-warning" href="{{ route('acompanantes_edit',$acompanante->id) }}" title="Modificar"><i class="material-icons">edit</i> Modificar</a>                    
                </div>
            </div>
        </div>
    </div>
@endsection