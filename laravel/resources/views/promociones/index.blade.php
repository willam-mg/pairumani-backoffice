@extends ('layouts.admin')
@section('header')
    <!-- Content Header (Page header) -->
    <h3 class="m-0 text-dark">Listado de Promociones</h3>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-12">
                    <ol class="breadcrumb" style="background-color: inherit">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
                        <li class="breadcrumb-item active">Promociones</li>
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
                            {{-- @if(kvfj(Auth::user()->rol->permisos,'promociones_create')) --}}
                                <a class="btn btn-success" href="{{ route('promociones_create') }}" title="Nueva promocion">
                                    <i class="material-icons">add</i> Nuevo
                                </a>
                            {{-- @endif --}}
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <div class="col-7">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <td>
                                                @include('promociones.search')
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <table class="table table-striped table-bordered table-condensed">
                                <thead class="text-primary">
                                    <th>Id</th>
                                    <th>Foto</th>
									<th>Nombre</th>
									<th>Precio</th>
                                    <th>Estado</th>
                                    <th>Habitacion</th>
									<th>Opciones</th>
                                </thead>
                               <tbody>
									@if(count($promociones))
										@foreach ($promociones as $promocion)
											<tr>
												<td>{{ $promocion->id }}</td>
												<td>
                                                    <img src="{{ $promocion->fotourl }}" alt="{{ $promocion->nombre }}" height="120px" width="120px" class="img-">
                                                </td>
												<td>{{ $promocion->nombre }}</td>
												<td>{{ $promocion->precio }}</td>
												<td>{{ $promocion->estado }}</td>
												<td>{{ $promocion->habitacion->nombre }}</td>
												<td style="width: 250px; text-align: center;">
                                                    {{-- @if(kvfj(Auth::user()->rol->permisos,'promocionreservas_index')) --}}
                                                        <a href="{{ route('promocionreservas_index',[$promocion->id]) }}" class="btn btn-primary btn-round btn-just-icon" title="Reserva Promocion">
                                                            <i class="material-icons">pending_actions</i>
                                                        </a>
                                                    {{-- @endif --}}
                                                    {{-- @if(kvfj(Auth::user()->rol->permisos,'promociones_show')) --}}
                                                        <a href="{{ route('promociones_show',$promocion->id) }}" class="btn btn-info btn-round btn-just-icon" title="Detalle promocion">
                                                            <i class="material-icons">visibility</i>
                                                        </a>
                                                    {{-- @endif --}}
													{{-- @if(kvfj(Auth::user()->rol->permisos,'promociones_edit')) --}}
														<a href="{{ route('promociones_edit',$promocion->id) }}" class="btn btn-warning btn-round btn-just-icon" title="Editar promocion">
															<i class="material-icons">mode_edit</i>
														</a>
													{{-- @endif --}}
													{{-- @if(kvfj(Auth::user()->rol->permisos,'promociones_destroy')) --}}
                                                        <a href="" data-target="#modal-delete-{{$promocion->id}}" data-toggle="modal"  class="btn btn-danger btn-round btn-just-icon" title="Eliminar promocion">
                                                            <i class="material-icons">delete</i>
                                                        </a>
													{{-- @endif --}}
												</td>
											</tr>
											@include('promociones.modal')
										@endforeach
									@else
										<tr>
											<td colspan="6" style="text-align: center;">
												<h2><span class="badge badge-danger" style="font-size: 20px">No Existen promociones</span></h2>
											</td>
										</tr>
									@endif
								</tbody>
                            </table>
                            {{$promociones->appends(request()->all())->render()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection