@extends ('layouts.admin')
@section('header')
    <!-- Content Header (Page header) -->
    <h3 class="m-0 text-dark">Listado de Reservas Cafeteria</h3>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-12">
                    <ol class="breadcrumb" style="background-color: inherit">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
                        <li class="breadcrumb-item active">Reservas Cafeteria</li>
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
                            @if(kvfj(Auth::user()->rol->permisos,'cafeteria_create'))
                                <a class="btn btn-success" href="{{ route('cafeteria_create') }}" title="Nuevo cafeteria">
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
									@if(count($cafeterias))
										@foreach ($cafeterias as $cafeteria)
											<tr>
												<td>{{ $cafeteria->id }}</td>
                                                <td>{{ $cafeteria->hospedaje ? $cafeteria->hospedaje->cliente->nombrecompleto : $cafeteria->cliente->nombrecompleto }}</td>
                                                <td>{{ $cafeteria->fecha }}</td>
												<td>{{ $cafeteria->hora }}</td>
												<td>{{ $cafeteria->hospedaje ? $cafeteria->hospedaje->id : '(ND)' }}</td>
                                                <td>{{ env('MONEYLOCAL') }} {{ number_format($cafeteria->total,2) }}</td>
												<td>
                                                    @if(kvfj(Auth::user()->rol->permisos,'cafeteria_reporte'))
                                                        <a href="{{ route('cafeteria_reporte',$cafeteria->id) }}" class="btn btn-primary btn-round btn-just-icon" title="Comprobante" target="_blank">
                                                            <i class="material-icons">print</i>
                                                        </a>
                                                    @endif
                                                    @if(kvfj(Auth::user()->rol->permisos,'cafeteria_show'))
                                                        <a href="{{ route('cafeteria_show',$cafeteria->id) }}" class="btn btn-info btn-round btn-just-icon" title="Detalle Cafeteria">
                                                            <i class="material-icons">visibility</i>
                                                        </a>
                                                    @endif
													@if(kvfj(Auth::user()->rol->permisos,'cafeteria_destroy'))
														<a name="eliminar" href="" data-target="#modal-delete-{{$cafeteria->id}}" data-toggle="modal" class="btn btn-danger btn-round btn-just-icon" title="Eliminar Cafeteria">
															<i class="material-icons">delete</i>
														</a>
													@endif
												</td>
											</tr>
											@include('cafeteria.modal')
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
							{{$cafeterias->appends(request()->all())->render()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection