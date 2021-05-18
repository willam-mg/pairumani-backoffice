@extends ('layouts.admin')
@section('header')
    <!-- Content Header (Page header) -->
    <h3 class="m-0">Usuario: {{ $usuario->nombre }} Permisos de Rol: {{ $usuario->rol->nombre }} (ID: {{ $usuario->rol->id }})</h3>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-12">
                    <ol class="breadcrumb" style="background-color: inherit">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('usuarios_index') }}">Usuarios</a></li>
                        <li class="breadcrumb-item active">Usuario: {{ $usuario->nombre.' '.$usuario->apellido }} Permisos</li>
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
                        <div class="row">
                            @foreach(user_permissions() as $key => $value)
                                <div class="col-md-4">
                                    <div class="card card-nav-tabs">
                                        <div class="card-header card-header-primary d-flex align-items-center">
                                            {!! $value['icon'] !!}
                                            <p class="mb-0" style="font-size: 30px">
                                                {{ $value['title'] }}
                                            </p>
                                        </div>
                                        <div class="card-body">
                                            @foreach($value['keys'] as $k => $v)
                                                <div class="form-check">
                                                    @if(kvfj($usuario->rol->permisos,$k))
                                                        <i class="material-icons">check</i>
                                                    @else
                                                        <i class="material-icons">close</i>
                                                    @endif
                                                    <strong>{{ $v }}</strong>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection