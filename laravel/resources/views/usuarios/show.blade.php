@extends('layouts.admin')
@section('contenido')

    <div class="row">
        <div class="col-md-6">
            <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                    <div class="text-center">
                        <img class="profile-user-img img-fluid img-circle" src="/imagenes/usuario.png" alt="{{ $usuario->nombre }}">
                    </div>
                    <h3 class="profile-username text-center">{{ $usuario->nombre }} {{ $usuario->apellido }}</h3>
                    <p class="text-muted text-center">{{ !empty($usuario->rol) ? $usuario->rol->nombre : '' }}</p>
                    <ul class="list-group list-group-unbordered">
                        <li class="list-group-item">
                            <b>Nombre</b> <a class="pull-right">{{ $usuario->nombre }}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Apellido</b> <a class="pull-right">{{ $usuario->apellido }}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Email</b> <a class="pull-right">{{ $usuario->email }}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Roles</b> <a class="pull-right">{{ !empty($usuario->rol) ? $usuario->rol->nombre : '' }}</a>
                        </li> 
                    </ul>
                    <a href="{{ route('usuario_edit', $usuario->id) }}" class="btn btn-primary btn-block"><b>Editar</b></a>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                    <h3 class="box-title">Rol</h3>
                    @if(!empty($usuario->rol) ? $permisos : '')
                        <strong>{{ !empty($usuario->rol) ? $usuario->rol->nombre : '' }}</strong>
                        <br>
                        <small>Permisos:
                            @foreach(user_permissions() as $key => $value)
                                @foreach($value['keys'] as $k => $v)
                                    @if(kvfj($permisos,$k))
                                        @if(count($contar))
                                            <div class="form-check">
                                                <ul>
                                                    <li>{{ $v }}</li>                                       
                                                </ul>
                                            </div>                    
                                        @endif
                                    @endif
                                @endforeach
                            @endforeach
                        </small>
                    @else
                        <small>No tiene ningun permiso asignado</small>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection