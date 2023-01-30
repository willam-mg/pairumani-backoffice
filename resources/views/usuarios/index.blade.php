@extends ('layouts.admin')
@section('header')
    <!-- Content Header (Page header) -->
    <h3 class="m-0">Listado de Usuarios</h3>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-12">
                    <ol class="breadcrumb" style="background-color: inherit">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
                        <li class="breadcrumb-item active">Usuarios</li>
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
                            @if(kvfj(Auth::user()->rol->permisos,'usuarios_create'))
                                <a class="btn btn-success" href="{{ route('usuarios_create') }}" title="Nuevo usuario">
                                    <i class="material-icons">add</i> Nuevo
                                </a>
                            @endif
                            {{-- @if(kvfj(Auth::user()->rol->permisos,'usuarios_reporte'))
                                <a class="btn btn-info" href="{{ route('usuarios_reporte') }}" target="_blank" data-toggle="tooltip" data-placement="top" title="Reporte de usuarios">
                                    <i class="material-icons">local_printshop</i> Reporte
                                </a>
                            @endif --}}
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <div class="col-7">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <td>
                                                @include('usuarios.search')
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <table class="table table-striped table-bordered table-condensed">
                                <thead class="text-primary">
                                    <th>Id</th>
									<th>Usuario</th>
									<th>Telefono</th>
									<th>Email</th>
									<th>Rol</th>
									<th>Fecha Registro</th>
									<th>Fecha Actualización</th>
									<th>Opciones</th>
                                </thead>
                               <tbody>
									@if(count($usuarios))
										@foreach ($usuarios as $usuario)
											<tr>
												<td>{{ $usuario->id }}</td>
												<td>{{ $usuario->nombre }} {{ $usuario->apellido }}</td>
												<td>{{ $usuario->telefono }}</td>
												<td>{{ $usuario->email }}</td>
												<td>{{ $usuario->rol->nombre }}</td>
												<td>{{ $usuario->created_at }}</td>
												<td>{{ $usuario->updated_at }}</td>
												<td style="width: 250px; text-align: center;">
													@if(kvfj(Auth::user()->rol->permisos,'usuarios_edit'))
														<a href="{{ route('usuarios_edit',$usuario->id) }}" class="btn btn-warning btn-round btn-just-icon" title="Editar usuario">
															<i class="material-icons">mode_edit</i>
														</a>
													@endif
													@if(kvfj(Auth::user()->rol->permisos,'usuarios_show'))
														<a href="{{ route('usuarios_show',$usuario->id) }}" class="btn btn-info btn-round btn-just-icon" title="Ver permisos">
															<i class="material-icons">remove_red_eye</i>
														</a>
													@endif
													@if(kvfj(Auth::user()->rol->permisos,'usuarios_destroy'))
														@if($usuario->rol->nombre != 'Administrador')
															<a href="" data-target="#modal-delete-{{$usuario->id}}" data-toggle="modal"  class="btn btn-danger btn-round btn-just-icon" title="Eliminar usuario">
																<i class="material-icons">delete</i>
															</a>												
														@endif
													@endif
												</td>
											</tr>
											@include('usuarios.modal')
										@endforeach
									@else
										<tr>
											<td colspan="9" style="text-align: center;">
												<h2><span class="badge badge-danger" style="font-size: 20px">No Existen Usuarios</span></h2>
											</td>
										</tr>
									@endif
								</tbody>
                            </table>
                            {{$usuarios->appends(request()->all())->render()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection