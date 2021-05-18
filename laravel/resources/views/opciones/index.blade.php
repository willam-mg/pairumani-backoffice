@extends ('layouts.admin')
@section('header')
    <!-- Content Header (Page header) -->
    <h3 class="m-0 text-dark">Listado de Opciones</h3>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-12">
                    <ol class="breadcrumb" style="background-color: inherit">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('restaurantecategorias_index') }}">Categorias</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('restaurantecategorias_show',$categoria->id) }}">Categoria: {{ $categoria->nombre }}</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('productos_index',$categoria->id) }}">Productos</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('productos_show',[$categoria->id,$producto->id]) }}">Producto: {{ $producto->nombre }}</a></li>
                        <li class="breadcrumb-item active">Opciones</li>
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
                            {{-- @if(kvfj(Auth::user()->rol->permisos,'opciones_create')) --}}
                                <a class="btn btn-success" href="{{ route('opciones_create',[$categoria->id,$producto->id]) }}" title="Nueva Opion">
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
                                                @include('opciones.search')
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
							<table class="table table-striped table-bordered table-condensed">
                                <thead class="text-primary">
                                    <th>Id</th>
									<th>Nombre</th>
									<th>Producto</th>
									<th>Opciones</th>
                                </thead>
								<tbody>
									@if(count($opciones))
										@foreach ($opciones as $opcion)
											<tr>
												<td>{{ $opcion->id }}</td>
                                                <td>{{ $opcion->nombre }}</td>
												<td>{{ $opcion->producto->nombre }}</td>
												<td>
                                                    {{-- @if(kvfj(Auth::user()->rol->permisos,'opciones_show')) --}}
                                                        <a href="{{ route('opciones_show',[$categoria->id,$producto->id,$opcion->id]) }}" class="btn btn-info btn-round btn-just-icon" title="Detalle opcion">
                                                            <i class="material-icons">visibility</i>
                                                        </a>
                                                    {{-- @endif --}}
													{{-- @if(kvfj(Auth::user()->rol->permisos,'opciones_edit')) --}}
														<a name="editar" href="{{ route('opciones_edit',[$categoria->id,$producto->id,$opcion->id]) }}" class="btn btn-warning btn-round btn-just-icon" title="Editar opcion">
															<i class="material-icons">mode_edit</i>
														</a>
													{{-- @endif --}}
													{{-- @if(kvfj(Auth::user()->rol->permisos,'opciones_destroy')) --}}
														<a name="eliminar" href="" data-target="#modal-delete-{{$opcion->id}}" data-toggle="modal" class="btn btn-danger btn-round btn-just-icon" title="Eliminar opcion">
															<i class="material-icons">delete</i>
														</a>
													{{-- @endif --}}
												</td>
											</tr>
											@include('opciones.modal')
										@endforeach
									@else
										<tr>
											<td colspan="4" style="text-align: center;">
												<h2><span class="badge badge-danger" style="font-size: 20px">No Existen opcions</span></h2>
											</td>
										</tr>
									@endif
								</tbody>
							</table>
							{{$opciones->appends(request()->all())->render()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection