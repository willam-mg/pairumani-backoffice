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
                        {{-- <li class="breadcrumb-item"><a href="{{ route('habitacioncategorias_show',$categoria->id) }}">Categoria: {{ $categoria->nombre }}</a></li> --}}
                        <li class="breadcrumb-item"><a href="{{ route('habitaciones_index') }}">Habitaciones</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('habitaciones_show',[$habitacion->id]) }}">Habitacion: {{ $habitacion->nombre }}</a></li>
                        <li class="breadcrumb-item active">Habitacion Frigobar</li>
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
                                <a class="btn btn-success" href="{{ route('habitacionfrigobar_create',[$habitacion->id]) }}" title="Nuevo producto frigobar">
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
                                                @include('habitacionfrigobar.search')
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
									<th>Habitacion</th>
									<th>Opciones</th>
                                </thead>
                               <tbody>
									@if(count($frigobars))
										@foreach ($frigobars as $frigobar)
											<tr>
												<td>{{ $frigobar->id }}</td>
												<td>{{ $frigobar->nombre }}</td>
												<td>{{ $frigobar->precio }}</td>
												<td>{{ $frigobar->habitacion->nombre }}</td>
												<td style="width: 250px; text-align: center;">
                                                    @if(kvfj(Auth::user()->rol->permisos,'habitacionfrigobar_show'))
                                                        <a href="{{ route('habitacionfrigobar_show',[$habitacion->id,$frigobar->id]) }}" class="btn btn-info btn-round btn-just-icon" title="Detalle frigobar">
                                                            <i class="material-icons">visibility</i>
                                                        </a>
                                                    @endif
													@if(kvfj(Auth::user()->rol->permisos,'habitacionfrigobar_edit'))
														<a href="{{ route('habitacionfrigobar_edit',[$habitacion->id,$frigobar->id]) }}" class="btn btn-warning btn-round btn-just-icon" title="Editar frigobar">
															<i class="material-icons">mode_edit</i>
														</a>
													@endif
													@if(kvfj(Auth::user()->rol->permisos,'habitacionfrigobar_destroy'))
                                                        <a href="" data-target="#modal-delete-{{$frigobar->id}}" data-toggle="modal"  class="btn btn-danger btn-round btn-just-icon" title="Eliminar frigobar">
                                                            <i class="material-icons">delete</i>
                                                        </a>
													@endif
												</td>
											</tr>
										@endforeach
									@else
										<tr>
											<td colspan="5" style="text-align: center;">
												<h2><span class="badge badge-danger" style="font-size: 20px">No Existen productos en el frigobar</span></h2>
											</td>
										</tr>
									@endif
								</tbody>
                            </table>
                            {{$frigobars->appends(request()->all())->render()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if(count($frigobars))
        @foreach ($frigobars as $frigobar)
            <x-page.delete-modal route="habitacionfrigobar_destroy" :model="$frigobar" nombre="Frigobar" />
        @endforeach
    @endif
@endsection