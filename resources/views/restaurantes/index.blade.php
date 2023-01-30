@extends ('layouts.admin')
@section('header')
    <!-- Content Header (Page header) -->
    <h3 class="m-0 text-dark">Listado de Reservas Restaurante</h3>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-12">
                    <ol class="breadcrumb" style="background-color: inherit">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
                        <li class="breadcrumb-item active">Reservas Restaurante</li>
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
                            @if(kvfj(Auth::user()->rol->permisos,'restaurantes_create'))
                                <a class="btn btn-success" href="{{ route('restaurantes_create') }}" title="Nuevo restaurante">
                                    <i class="material-icons">add</i> Nuevo
                                </a>
                            @endif
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
							<table class="table table-striped table-bordered table-condensed">
                                <thead class="text-primary">
                                    <th>Id</th>
                                    <th>Cliente</th>
									<th>Fecha</th>
									<th>Hora</th>
									<th>Hospedaje</th>
									<th>Total</th>
									<th>Opciones</th>
                                </thead>
								<tbody>
									@if(count($restaurantes))
										@foreach ($restaurantes as $restaurante)
											<tr>
												<td>{{ $restaurante->id }}</td>
                                                <td>{{ $restaurante->hospedaje ? $restaurante->hospedaje->cliente->nombrecompleto : $restaurante->cliente->nombrecompleto }}</td>
                                                <td>{{ $restaurante->fecha }}</td>
												<td>{{ $restaurante->hora }}</td>
												<td>{{ $restaurante->hospedaje ? $restaurante->hospedaje->id : '(ND)' }}</td>
                                                <td>{{ env('MONEYLOCAL') }} {{ number_format($restaurante->total,2) }}</td>
												<td>
                                                    @if(kvfj(Auth::user()->rol->permisos,'restaurantes_reporte'))
                                                        <a href="{{ route('restaurantes_reporte',$restaurante->id) }}" class="btn btn-primary btn-round btn-just-icon" title="Comprobante" target="_blank">
                                                            <i class="material-icons">print</i>
                                                        </a>
                                                    @endif
                                                    @if(kvfj(Auth::user()->rol->permisos,'restaurantes_show'))
                                                        <a href="{{ route('restaurantes_show',$restaurante->id) }}" class="btn btn-info btn-round btn-just-icon" title="Detalle restaurante">
                                                            <i class="material-icons">visibility</i>
                                                        </a>
                                                    @endif
													@if(kvfj(Auth::user()->rol->permisos,'restaurantes_destroy'))
														<a name="eliminar" href="" data-target="#modal-delete-{{$restaurante->id}}" data-toggle="modal" class="btn btn-danger btn-round btn-just-icon" title="Eliminar restaurante">
															<i class="material-icons">delete</i>
														</a>
													@endif
												</td>
											</tr>
											@include('restaurantes.modal')
										@endforeach
									@else
										<tr>
											<td colspan="7" style="text-align: center;">
												<h2><span class="badge badge-danger" style="font-size: 20px">No Existen reservas</span></h2>
											</td>
										</tr>
									@endif
								</tbody>
							</table>
							{{$restaurantes->appends(request()->all())->render()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection