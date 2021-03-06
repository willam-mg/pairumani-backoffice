@extends('layouts.admin')
@section('header')
    <!-- Content Header (Page header) -->
    <h3 class="m-0 text-dark">Detalle Cliente</h3>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-12">
                    <ol class="breadcrumb" style="background-color: inherit">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('clientes_index') }}">Clientes</a></li>
                        <li class="breadcrumb-item active">Detalle Cliente</li>
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
                <h4>Cliente {{ $cliente->id }}</h4>
                <hr>
                <table class="table table-striped table-bordered">
                    <tbody>
                        <tr>
                            <th>Nombres</th>
                            <td>{{ $cliente->nombres }}</td>
                        </tr>
                        <tr>
                            <th>Apellidos</th>
                            <td>{{ $cliente->apellidos }}</td>
                        </tr>
                        <tr>
                            <th>Fecha Nacimiento</th>
                            <td>{{ $cliente->fecha_nacimiento }}</td>
                        </tr>
                        <tr>
                            <th>Tipo Documento</th>
                            <td>{{ $cliente->tipo_documento }}</td>
                        </tr>
                        <tr>
                            <th>Num Documento</th>
                            <td>{{ $cliente->num_documento }}</td>
                        </tr>
                        <tr>
                            <th>Celular - Telefono</th>
                            <td>{{ $cliente->celular }} {{ $cliente->telefono }}</td>
                        </tr>
                        <tr>
                            <th>Direccion</th>
                            <td>{{ $cliente->direccion }}</td>
                        </tr>
                        <tr>
                            <th>Ciudad</th>
                            <td>{{ $cliente->ciudad }}</td>
                        </tr>
                        <tr>
                            <th>Pais</th>
                            <td>{{ $cliente->pais }}</td>
                        </tr>
                        <tr>
                            <th>Oficio</th>
                            <td>{{ $cliente->oficio }}</td>
                        </tr>
                        <tr>
                            <th>Empresa</th>
                            <td>{{ $cliente->empresa }}</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>{{ $cliente->email }}</td>
                        </tr>
                        <tr>
                            <th>Motivo Viaje</th>
                            <td>{{ $cliente->motivo_viaje }}</td>
                        </tr>
                    </tbody>
                </table>
                <div class="form-group text-right">
                    <a class="btn btn-default" href="{{ route('clientes_index') }}" title="Cerrar"><i class="material-icons">clear</i> Cerrar</a>
                    @if(kvfj(Auth::user()->rol->permisos,'clientes_edit'))
                        <a class="btn btn-warning" href="{{ route('clientes_edit',$cliente->id) }}" title="Modificar"><i class="material-icons">edit</i> Modificar</a> 
                    @endif                   
                </div>
            </div>
        </div>
    </div>
@endsection