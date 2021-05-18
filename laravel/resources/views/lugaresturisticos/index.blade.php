@extends ('layouts.admin')
@section('header')
    <!-- Content Header (Page header) -->
    <h3 class="m-0 text-dark">Listado de Lugares Turisticos</h3>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-12">
                    <ol class="breadcrumb" style="background-color: inherit">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
                        <li class="breadcrumb-item active">Lugares Turisticos</li>
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
                            {{-- @if(kvfj(Auth::user()->rol->permisos,'lugaresturisticos_create')) --}}
                                <a class="btn btn-success" href="{{ route('lugaresturisticos_create') }}" title="Nuevo lugar turistico">
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
                                                @include('lugaresturisticos.search')
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
									<th>Latitud</th>
                                    <th>Longitud</th>
                                    <th>Precio Recorrido</th>
                                    <th>Tipo</th>
									<th>Opciones</th>
                                </thead>
                               <tbody>
									@if(count($lugares))
										@foreach ($lugares as $lugar)
											<tr>
												<td>{{ $lugar->id }}</td>
												<td>
                                                    <img src="{{ $lugar->fotourl }}" alt="{{ $lugar->nombre }}" height="120px" width="120px" class="img-">
                                                </td>
												<td>{{ $lugar->nombre }}</td>
												<td>{{ $lugar->lat }}</td>
												<td>{{ $lugar->lng }}</td>
												<td>{{ $lugar->precio_recorrido }}</td>
												<td>{{ $lugar->tipo }}</td>
												<td style="width: 250px; text-align: center;">
                                                    {{-- @if(kvfj(Auth::user()->rol->permisos,'lugaresturisticos_galeria')) --}}
                                                        <a href="{{ route('lugaresturisticos_galeria',$lugar->id) }}" class="btn btn-success btn-round btn-just-icon" title="Galeria lugar turistico">
                                                            <i class="material-icons">photo_size_select_actual</i>
                                                        </a>
                                                    {{-- @endif --}}
                                                    {{-- @if(kvfj(Auth::user()->rol->permisos,'lugaresturisticos_show')) --}}
                                                        <a href="{{ route('lugaresturisticos_show',$lugar->id) }}" class="btn btn-info btn-round btn-just-icon" title="Detalle lugar turistico">
                                                            <i class="material-icons">visibility</i>
                                                        </a>
                                                    {{-- @endif --}}
													{{-- @if(kvfj(Auth::user()->rol->permisos,'lugaresturisticos_edit')) --}}
														<a href="{{ route('lugaresturisticos_edit',$lugar->id) }}" class="btn btn-warning btn-round btn-just-icon" title="Editar lugar turistico">
															<i class="material-icons">mode_edit</i>
														</a>
													{{-- @endif --}}
													{{-- @if(kvfj(Auth::user()->rol->permisos,'lugaresturisticos_destroy')) --}}
                                                        <a href="" data-target="#modal-delete-{{$lugar->id}}" data-toggle="modal"  class="btn btn-danger btn-round btn-just-icon" title="Eliminar lugar turistico">
                                                            <i class="material-icons">delete</i>
                                                        </a>
													{{-- @endif --}}
												</td>
											</tr>
											@include('lugaresturisticos.modal')
										@endforeach
									@else
										<tr>
											<td colspan="7" style="text-align: center;">
												<h2><span class="badge badge-danger" style="font-size: 20px">No Existen lugares turisticos</span></h2>
											</td>
										</tr>
									@endif
								</tbody>
                            </table>
                            {{$lugares->appends(request()->all())->render()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection