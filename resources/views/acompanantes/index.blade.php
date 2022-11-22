@extends ('layouts.admin')
@section('header')
    <!-- Content Header (Page header) -->
    <h3 class="m-0 text-dark">Listado de Acompañantes</h3>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-12">
                    <ol class="breadcrumb" style="background-color: inherit">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('clientes_index') }}">Clientes</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('clientes_show',$cliente->id) }}">Cliente: {{ $cliente->nombres.' '.$cliente->apellidos }}</a></li>
                        <li class="breadcrumb-item active">Acompañantes</li>
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
                            @if(kvfj(Auth::user()->rol->permisos,'acompanantes_create'))
                                <a class="btn btn-success" href="{{ route('acompanantes_create',$cliente->id) }}" title="Nuevo acompañante">
                                    <i class="material-icons">add</i> Nuevo
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
                                                @include('acompanantes.search')
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
							<table class="table table-striped table-bordered table-condensed">
                                <thead class="text-primary">
                                    <th>Id</th>
									<th>Nombre</th>
									<th>Tipo Documento</th>
                                    <th>Número Documento</th>
									<th>Nacionalidad</th>
									<th>Fecha Nacimiento</th>
                                    <th>Ciudad</th>
									<th>Opciones</th>
                                </thead>
								<tbody>
									@if(count($acompanantes))
										@foreach ($acompanantes as $acompañante)
											<tr>
												<td>{{ $acompañante->id }}</td>
                                                <td>{{ $acompañante->nombre }}</td>
												<td>{{ $acompañante->tipo_documento }}</td>
												<td>{{ $acompañante->num_documento }}</td>
												<td>{{ $acompañante->nacionalidad }}</td>
												<td>{{ $acompañante->fecha_nacimiento }}</td>
												<td>{{ $acompañante->ciudad }}</td>
												<td>
                                                    @if(kvfj(Auth::user()->rol->permisos,'acompanantes_show'))
                                                        <a href="{{ route('acompanantes_show',[$cliente->id,$acompañante->id]) }}" class="btn btn-info btn-round btn-just-icon" title="Detalle acompañante">
                                                            <i class="material-icons">visibility</i>
                                                        </a>
                                                    @endif
													@if(kvfj(Auth::user()->rol->permisos,'acompanantes_edit'))
														<a name="editar" href="{{ route('acompanantes_edit',[$cliente->id,$acompañante->id]) }}" class="btn btn-warning btn-round btn-just-icon" title="Editar acompañante">
															<i class="material-icons">mode_edit</i>
														</a>
													@endif
													@if(kvfj(Auth::user()->rol->permisos,'acompanantes_destroy'))
														<a name="eliminar" href="" data-target="#modal-delete-{{$acompañante->id}}" data-toggle="modal" class="btn btn-danger btn-round btn-just-icon" title="Eliminar acompañante">
															<i class="material-icons">delete</i>
														</a>
													@endif
												</td>
											</tr>
											@include('acompanantes.modal')
										@endforeach
									@else
										<tr>
											<td colspan="7" style="text-align: center;">
												<h2><span class="badge badge-danger" style="font-size: 20px">No Existen acompañantes</span></h2>
											</td>
										</tr>
									@endif
								</tbody>
							</table>
							{{$acompanantes->appends(request()->all())->render()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection