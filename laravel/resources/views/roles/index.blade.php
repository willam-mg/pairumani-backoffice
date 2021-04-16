@extends ('layouts.admin')
@section('header')
    <!-- Content Header (Page header) -->
    <div class="card">
        <div class="card-body py-3 justify-content-between align-items-center">
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="m-0 text-dark">Listado de Roles</h3>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right" style="background-color: inherit">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
                        <li class="breadcrumb-item active">Roles</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div>
    </div>
    <!-- /.content-header -->
@endsection
@section ('contenido')
    <div class="content">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="card-header card-header-icon card-header-rose">
                        <div class="card-icon">
                            <i class="material-icons">date_range</i>
                        </div>
                        <div style="text-align: right;padding-top: 15px;">
                            @if(kvfj(Auth::user()->rol->permisos,'roles_create'))
                                <a class="btn btn-success" href="{{ route('roles_create') }}" title="Nuevo rol">
                                    <i class="material-icons">add</i> Nuevo
                                </a>
                            @endif
                            @if(kvfj(Auth::user()->rol->permisos,'roles_reporte'))
                                <a class="btn btn-info" href="{{ route('roles_reporte') }}" target="_blank" data-toggle="tooltip" data-placement="top" title="Reporte de roles">
                                    <i class="material-icons">local_printshop</i> Reporte
                                </a>
                            @endif
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <div class="col-7">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <td>
                                                @include('roles.search')
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <table class="table table-striped table-bordered table-condensed">
                                <thead class="text-primary">
                                    <th>Id</th>
                                    <th>Nombre</th>
                                    <th>Descripcion</th>
                                    <th>Opciones</th>
                                </thead>
                                <tbody>
                                    @if(count($roles))
                                        @foreach ($roles as $rol)
                                            <tr>
                                                <td>{{ $rol->id }}</td>
                                                <td>{{ $rol->nombre }}</td>
                                                <td>{{ $rol->descripcion }}</td>
                                                <td style="width: 20%">
                                                    @if(kvfj(Auth::user()->rol->permisos,'roles_edit'))
                                                        <a href="{{ route('roles_edit',$rol->id) }}" class="btn btn-info btn-round btn-just-icon" title="Editar rol">
                                                            <i class="material-icons">mode_edit</i>
                                                        </a>
                                                    @endif
                                                    @if(kvfj(Auth::user()->rol->permisos,'roles_permisos'))
                                                        <a href="{{ route('roles_permisos',$rol->id) }}" class="btn btn-warning btn-round btn-just-icon" title="Permisos de rol">
                                                            <i class="material-icons">settings</i>
                                                        </a>
                                                    @endif
                                                    @if(kvfj(Auth::user()->rol->permisos,'roles_destroy'))
                                                        <a href="" data-target="#modal-delete-{{$rol->id}}" data-toggle="modal" class="btn btn-danger btn-round btn-just-icon" title="Eliminar rol">
                                                            <i class="material-icons">delete</i>
                                                        </a>
                                                    @endif
                                                </td>
                                            </tr>
                                            @include('roles.modal')
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="4" style="text-align: center;">
                                                <h2><span class="bagde bagde-danger" style="font-size: 20px">No Existen Roles</span></h2>
                                            </td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                            {{$roles->appends(request()->all())->render()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection