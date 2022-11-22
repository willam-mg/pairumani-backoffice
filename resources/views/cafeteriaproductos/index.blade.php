@extends ('layouts.admin')
@section('header')
    <!-- Content Header (Page header) -->
    <h3 class="m-0 text-dark">Listado de Productos</h3>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-12">
                    <ol class="breadcrumb" style="background-color: inherit">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('cafeteriacategorias_index') }}">Categorias</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('cafeteriacategorias_show',$categoria->id) }}">Categoria: {{ $categoria->nombre }}</a></li>
                        <li class="breadcrumb-item active">Productos</li>
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
                            @if(kvfj(Auth::user()->rol->permisos,'cafeteria_productos_create'))
                                <a class="btn btn-success" href="{{ route('cafeteria_productos_create',$categoria->id) }}" title="Nuevo producto">
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
                                                @include('cafeteriaproductos.search')
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
									<th>Categoria</th>
									<th>Opciones</th>
                                </thead>
                               <tbody>
									@if(count($productos))
										@foreach ($productos as $producto)
											<tr>
												<td>{{ $producto->id }}</td>
												<td>
                                                    <img src="{{ $producto->fotourl }}" alt="{{ $producto->nombre }}" height="120px" width="120px" class="img-">
                                                </td>
												<td>{{ $producto->nombre }}</td>
												<td>{{ $producto->precio }}</td>
												<td>{{ $producto->categoria->nombre }}</td>
												<td style="width: 250px; text-align: center;">
                                                    @if(kvfj(Auth::user()->rol->permisos,'cafeteria_opciones_index'))
                                                        <a href="{{ route('cafeteria_opciones_index',[$categoria->id,$producto->id]) }}" class="btn btn-primary btn-round btn-just-icon" title="Producto opciones">
                                                            <i class="material-icons">grading</i>
                                                        </a>
                                                    @endif
                                                    @if(kvfj(Auth::user()->rol->permisos,'cafeteria_tamanos_index'))
                                                        <a href="{{ route('cafeteria_tamanos_index',[$categoria->id,$producto->id]) }}" class="btn btn-info btn-round btn-just-icon" title="Producto tamaño">
                                                            <i class="material-icons">fastfood</i>
                                                        </a>
                                                    @endif
                                                    @if(kvfj(Auth::user()->rol->permisos,'cafeteria_productos_galeria'))
                                                        <a href="{{ route('cafeteria_productos_galeria',[$categoria->id,$producto->id]) }}" class="btn btn-success btn-round btn-just-icon" title="Galeria producto">
                                                            <i class="material-icons">photo_size_select_actual</i>
                                                        </a>
                                                    @endif
                                                    @if(kvfj(Auth::user()->rol->permisos,'cafeteria_productos_show'))
                                                        <a href="{{ route('cafeteria_productos_show',[$categoria->id,$producto->id]) }}" class="btn btn-info btn-round btn-just-icon" title="Detalle producto">
                                                            <i class="material-icons">visibility</i>
                                                        </a>
                                                    @endif
													@if(kvfj(Auth::user()->rol->permisos,'cafeteria_productos_edit'))
														<a href="{{ route('cafeteria_productos_edit',[$categoria->id,$producto->id]) }}" class="btn btn-warning btn-round btn-just-icon" title="Editar producto">
															<i class="material-icons">mode_edit</i>
														</a>
													@endif
													@if(kvfj(Auth::user()->rol->permisos,'cafeteria_productos_destroy'))
                                                        <a href="" data-target="#modal-delete-{{$producto->id}}" data-toggle="modal"  class="btn btn-danger btn-round btn-just-icon" title="Eliminar producto">
                                                            <i class="material-icons">delete</i>
                                                        </a>
													@endif
												</td>
											</tr>
											@include('cafeteriaproductos.modal')
										@endforeach
									@else
										<tr>
											<td colspan="6" style="text-align: center;">
												<h2><span class="badge badge-danger" style="font-size: 20px">No Existen productos</span></h2>
											</td>
										</tr>
									@endif
								</tbody>
                            </table>
                            {{$productos->appends(request()->all())->render()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection