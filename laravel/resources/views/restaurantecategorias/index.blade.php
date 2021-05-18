@extends ('layouts.admin')
@section('header')
    <!-- Content Header (Page header) -->
    <h3 class="m-0 text-dark">Listado de Restaurante Categorias</h3>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-12">
                    <ol class="breadcrumb" style="background-color: inherit">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
                        <li class="breadcrumb-item active">Restaurante Categorias</li>
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
                            {{-- @if(kvfj(Auth::user()->rol->permisos,'restaurantecategoria_create')) --}}
                                <a class="btn btn-success" href="{{ route('restaurantecategorias_create') }}" title="Nuevo restaurante categoria">
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
                                                @include('restaurantecategorias.search')
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
									<th>Descripcion</th>
									<th>Opciones</th>
                                </thead>
                               <tbody>
									@if(count($categorias))
										@foreach ($categorias as $categoria)
											<tr>
												<td>{{ $categoria->id }}</td>
												<td>
                                                    <img src="{{ $categoria->fotourl }}" alt="{{ $categoria->nombre }}" height="120px" width="120px" class="img-">
                                                </td>
												<td>{{ $categoria->nombre }}</td>
												<td>{!! $categoria->descripcion !!}</td>
												<td style="width: 250px; text-align: center;">
                                                    {{-- @if(kvfj(Auth::user()->rol->permisos,'productos_index')) --}}
                                                        <a href="{{ route('productos_index',$categoria->id) }}" class="btn btn-success btn-round btn-just-icon" title="Restaurante Productos">
                                                            <i class="material-icons">restaurant_menu</i>
                                                        </a>
                                                    {{-- @endif --}}
                                                    {{-- @if(kvfj(Auth::user()->rol->permisos,'restaurantecategorias_show')) --}}
                                                        <a href="{{ route('restaurantecategorias_show',$categoria->id) }}" class="btn btn-info btn-round btn-just-icon" title="Detalle restaurante categoria">
                                                            <i class="material-icons">visibility</i>
                                                        </a>
                                                    {{-- @endif --}}
													{{-- @if(kvfj(Auth::user()->rol->permisos,'restaurantecategorias_edit')) --}}
														<a href="{{ route('restaurantecategorias_edit',$categoria->id) }}" class="btn btn-warning btn-round btn-just-icon" title="Editar restaurante categoria">
															<i class="material-icons">mode_edit</i>
														</a>
													{{-- @endif --}}
													{{-- @if(kvfj(Auth::user()->rol->permisos,'restaurantecategorias_destroy')) --}}
                                                        <a href="" data-target="#modal-delete-{{$categoria->id}}" data-toggle="modal"  class="btn btn-danger btn-round btn-just-icon" title="Eliminar restaurante categoria">
                                                            <i class="material-icons">delete</i>
                                                        </a>
													{{-- @endif --}}
												</td>
											</tr>
											@include('restaurantecategorias.modal')
										@endforeach
									@else
										<tr>
											<td colspan="5" style="text-align: center;">
												<h2><span class="badge badge-danger" style="font-size: 20px">No Existen restaurante categorias</span></h2>
											</td>
										</tr>
									@endif
								</tbody>
                            </table>
                            {{$categorias->appends(request()->all())->render()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection