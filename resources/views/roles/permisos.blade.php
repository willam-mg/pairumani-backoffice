@extends ('layouts.admin')
@section('header')
    <!-- Content Header (Page header) -->
    <h3 class="m-0 text-dark">Permisos de Rol: {{ $rol->nombre }} (ID: {{ $rol->id }})</h3>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-12">
                    <ol class="breadcrumb" style="background-color: inherit">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('roles_index') }}">Roles</a></li>
                        <li class="breadcrumb-item active">Rol Permisos</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div>
    </div>
    <!-- /.content-header -->
@endsection
@section ('contenido')
    <div class="card">
        {{-- <div class="card-header card-header-rose card-header-icon">
            <div class="card-icon">
                <i class="material-icons">assignment</i>
            </div>
            <h4 class="card-title">Register Form</h4>
        </div> --}}
        <div class="card-body ">
            <div class="row">
                <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                    <div class="container-fluid">
                        <form action="{{ route('roles_permisos',$rol->id) }}" method="POST">
                            @csrf
                            <div class="row">
                                @foreach(user_permissions() as $key => $value)
                                    <div class="col-md-4">
                                        <div class="card card-nav-tabs shadow-normal">
                                            <div class="card-header card-header-primary d-flex align-items-center pt-2 pb-2">
                                                <div class="mr-1">
                                                    {!! $value['icon'] !!}
                                                </div>
                                                <p class="mb-0" style="font-size: 25px">
                                                    {{ $value['title'] }}
                                                </p>
                                            </div>
                                            <div class="card-body">
                                                @foreach($value['keys'] as $k => $v)
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input" type="checkbox" name="{{ $k }}" value="true" @if(kvfj($rol->permisos,$k)) checked @endif>
                                                            {{ $v }}
                                                            <span class="form-check-sign">
                                                                <span class="check"></span>
                                                            </span>
                                                        </label>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <button type="submit" class="btn btn-primary">Guardar</button>
                            <a href="{{ route('roles_index') }}" class="btn btn-danger">Cancelar</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection