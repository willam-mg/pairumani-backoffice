@extends ('layouts.admin')
@section('header')
    <!-- Content Header (Page header) -->
    <h3 class="m-0 text-dark">Listado de tamaño</h3>
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
                        <li class="breadcrumb-item active">Tamaño</li>
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
                            @if(kvfj(Auth::user()->rol->permisos,'tamanos_create'))
                                <a class="btn btn-success" href="{{ route('tamanos_create',[$categoria->id,$producto->id]) }}" title="Nuevo tamaño">
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
                                                @include('tamanos.search')
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
							<table class="table table-striped table-bordered table-condensed">
                                <thead class="text-primary">
                                    <th>Id</th>
									<th>Nombre</th>
									<th>Precio</th>
									<th>Producto</th>
									<th>Opciones</th>
                                </thead>
								<tbody>
									@if(count($tamano))
										@foreach ($tamano as $tamaño)
											<tr>
												<td>{{ $tamaño->id }}</td>
                                                <td>{{ $tamaño->nombre }}</td>
                                                <td>{{ $tamaño->precio }}</td>
												<td>{{ $tamaño->producto->nombre }}</td>
												<td>
                                                    @if(kvfj(Auth::user()->rol->permisos,'tamanos_show'))
                                                        <a href="{{ route('tamanos_show',[$categoria->id,$producto->id,$tamaño->id]) }}" class="btn btn-info btn-round btn-just-icon" title="Detalle tamaño">
                                                            <i class="material-icons">visibility</i>
                                                        </a>
                                                    @endif
													@if(kvfj(Auth::user()->rol->permisos,'tamanos_edit'))
														<a name="editar" href="{{ route('tamanos_edit',[$categoria->id,$producto->id,$tamaño->id]) }}" class="btn btn-warning btn-round btn-just-icon" title="Editar tamaño">
															<i class="material-icons">mode_edit</i>
														</a>
													@endif
													@if(kvfj(Auth::user()->rol->permisos,'tamanos_destroy'))
														<a name="eliminar" href="" data-target="#modal-delete-{{$tamaño->id}}" data-toggle="modal" class="btn btn-danger btn-round btn-just-icon" title="Eliminar tamaño">
															<i class="material-icons">delete</i>
														</a>
													@endif
												</td>
											</tr>
											@include('tamanos.modal')
										@endforeach
									@else
										<tr>
											<td colspan="5" style="text-align: center;">
												<h2><span class="badge badge-danger" style="font-size: 20px">No Existen tamano</span></h2>
											</td>
										</tr>
									@endif
								</tbody>
							</table>
							{{$tamano->appends(request()->all())->render()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection