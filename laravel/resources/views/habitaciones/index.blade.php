@extends ('layouts.admin')
@section('header')
    <!-- Content Header (Page header) -->
    <h3 class="m-0 text-dark">Listado de Habitaciones</h3>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-12">
                    <ol class="breadcrumb" style="background-color: inherit">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
                        {{-- <li class="breadcrumb-item"><a href="{{ route('habitacioncategorias_index') }}">Categorias</a></li> --}}
                        {{-- @if ($categoria)
                            <li class="breadcrumb-item"><a href="{{ route('habitacioncategorias_show',$categoria->id) }}">Categoria: {{ $categoria->nombre }}</a></li>
                        @endif --}}
                        <li class="breadcrumb-item active">Habitaciones</li>
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
                            @if(kvfj(Auth::user()->rol->permisos,'habitaciones_create'))
                                <a class="btn btn-success" href="{{ route('habitaciones_create') }}" title="Nueva habitacion">
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
                                                @include('habitaciones.search')
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
									<th>Num Habitacion</th>
                                    <th>Precio</th>
                                    <th>Precio Promocion</th>
                                    <th>Capacidad Minima</th>
                                    <th>Capacidad Maxima</th>
                                    <th>Estado</th>
									<th>Categoria</th>
									<th>Opciones</th>
                                </thead>
                               <tbody>
									@if(count($habitaciones))
										@foreach ($habitaciones as $habitacion)
											<tr>
												<td>{{ $habitacion->id }}</td>
												<td>
                                                    <img src="{{ $habitacion->fotourl }}" alt="{{ $habitacion->nombre }}" height="120px" width="120px" class="img-">
                                                </td>
												<td>{{ $habitacion->nombre }}</td>
												<td>{{ $habitacion->num_habitacion }}</td>
												<td>{{ $habitacion->precio }}</td>
												<td>{{ $habitacion->promocion ? $habitacion->promocion->precio : '(ND)' }}</td>
												<td>{{ $habitacion->capacidad_minima }}</td>
												<td>{{ $habitacion->capacidad_maxima }}</td>
												<td>{{ $habitacion->estado }}</td>
												<td>{{ $habitacion->categoria->nombre }}</td>
												<td style="width: 250px; text-align: center;">
                                                    @if(kvfj(Auth::user()->rol->permisos,'habitacionfrigobar_index'))
                                                        <a href="{{ route('habitacionfrigobar_index',[$habitacion->id]) }}" class="btn btn-warning btn-round btn-just-icon" title="Habitacion frigobar">
                                                            <i class="material-icons">kitchen</i>
                                                        </a>
                                                    @endif
                                                    @if(kvfj(Auth::user()->rol->permisos,'reservas_index'))
                                                        <a href="{{ route('reservas_index',[$habitacion->id]) }}" class="btn btn-primary btn-round btn-just-icon" title="Reserva Habitacion">
                                                            <i class="material-icons">pending_actions</i>
                                                        </a>
                                                    @endif
                                                    @if(kvfj(Auth::user()->rol->permisos,'habitaciones_galeria'))
                                                        <a href="{{ route('habitaciones_galeria',[$habitacion->id]) }}" class="btn btn-success btn-round btn-just-icon" title="Galeria habitacion">
                                                            <i class="material-icons">photo_size_select_actual</i>
                                                        </a>
                                                    @endif
                                                    @if(kvfj(Auth::user()->rol->permisos,'habitaciones_show'))
                                                        <a href="{{ route('habitaciones_show',[$habitacion->id]) }}" class="btn btn-info btn-round btn-just-icon" title="Detalle habitacion">
                                                            <i class="material-icons">visibility</i>
                                                        </a>
                                                    @endif
													@if(kvfj(Auth::user()->rol->permisos,'habitaciones_edit'))
														<a href="{{ route('habitaciones_edit',[$habitacion->id]) }}" class="btn btn-warning btn-round btn-just-icon" title="Editar habitacion">
															<i class="material-icons">mode_edit</i>
														</a>
													@endif
													@if(kvfj(Auth::user()->rol->permisos,'habitaciones_destroy'))
                                                        <a href="" data-target="#modal-delete-{{$habitacion->id}}" data-toggle="modal"  class="btn btn-danger btn-round btn-just-icon" title="Eliminar habitacion">
                                                            <i class="material-icons">delete</i>
                                                        </a>
													@endif
												</td>
											</tr>
										@endforeach
									@else
										<tr>
											<td colspan="11" style="text-align: center;">
												<h2><span class="badge badge-danger" style="font-size: 20px">No Existen habitaciones</span></h2>
											</td>
										</tr>
									@endif
								</tbody>
                            </table>
                            {{$habitaciones->appends(request()->all())->render()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if(count($habitaciones))
        @foreach ($habitaciones as $habitacion)
            <x-page.delete-modal route="habitaciones_destroy" :model="$habitacion" nombre="Habitacion" />
        @endforeach
    @endif
@endsection