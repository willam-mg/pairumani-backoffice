@extends ('layouts.admin')
@section('header')
    <!-- Content Header (Page header) -->
    <h3 class="m-0 text-dark">Listado de Hospedajes</h3>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-12">
                    <ol class="breadcrumb" style="background-color: inherit">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
                        <li class="breadcrumb-item active">Hospedajes</li>
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
                            @if(kvfj(Auth::user()->rol->permisos,'hospedajes_create'))
                                <a class="btn btn-success" href="{{ route('hospedajes_create') }}" title="Nuevo hospedaje">
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
                                                @include('hospedajes.search')
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
							<table class="table table-striped table-bordered table-condensed">
                                <thead class="text-primary">
                                    <th>Id</th>
									<th>Cliente</th>
									<th>Habitacion</th>
									<th>Checkin</th>
									<th>Checkout</th>
                                    <th>Adultos</th>
                                    <th>Niños</th>
                                    <th>Precio</th>
                                    <th>Precio Promocion</th>
                                    <th>Estado</th>
                                    <th>Total Hospedaje</th>
									<th>Opciones</th>
                                </thead>
								<tbody>
									@if(count($hospedajes))
										@foreach ($hospedajes as $hospedaje)
											<tr>
												<td>{{ $hospedaje->id }}</td>
                                                <td>{{ $hospedaje->cliente->nombres }} {{ $hospedaje->cliente->apellidos }}</td>
												<td>{{ $hospedaje->habitacion->nombre }}</td>
												<td>{{ $hospedaje->fecha_checkin }}</td>
												<td>{{ $hospedaje->fecha_checkout }}</td>
												<td>{{ $hospedaje->adultos }}</td>
												<td>{{ $hospedaje->niños }}</td>
												<td>{{ $hospedaje->precio }}</td>
												<td>{{ $hospedaje->precio_promocion ? $hospedaje->precio_promocion : '(ND)' }}</td>
                                                <td>{{ $hospedaje->estado }}</td>
                                                <td>{{ env('MONEYLOCAL') }} {{ number_format($hospedaje->total(),2) }}</td>
												<td>
                                                    @if($hospedaje->estado == 'Ocupado')
                                                        @if(kvfj(Auth::user()->rol->permisos,'hospedajes_frigobar'))
                                                            <a href="{{ route('hospedajes_frigobar',$hospedaje->id) }}" class="btn btn-primary btn-round btn-just-icon" title="Hospedaje Frigobar Productos">
                                                                <i class="material-icons">kitchen</i>
                                                            </a>
                                                        @endif
                                                        @if(kvfj(Auth::user()->rol->permisos,'hospedajes_reserva_cafeteria_productos'))
                                                            <a href="{{ route('hospedajes_reserva_cafeteria_productos',$hospedaje->id) }}" class="btn btn-danger btn-round btn-just-icon" title="Hospedaje Reserva Cafeteria Productos">
                                                                <i class="material-icons">storefront</i>
                                                            </a>
                                                        @endif
                                                        @if(kvfj(Auth::user()->rol->permisos,'hospedajes_reserva_productos'))
                                                            <a href="{{ route('hospedajes_reserva_productos',$hospedaje->id) }}" class="btn btn-warning btn-round btn-just-icon" title="Hospedaje Reserva Productos">
                                                                <i class="material-icons">restaurant</i>
                                                            </a>
                                                        @endif
                                                        @if(kvfj(Auth::user()->rol->permisos,'hospedajes_reserva_lugar'))
                                                            <a href="{{ route('hospedajes_reserva_lugar',$hospedaje->id) }}" class="btn btn-primary btn-round btn-just-icon" title="Hospedaje Reserva Lugar Turistico">
                                                                <i class="material-icons">pending_actions</i>
                                                            </a>
                                                        @endif
                                                        @if(kvfj(Auth::user()->rol->permisos,'hospedajes_transporte'))
                                                            <a href="{{ route('hospedajes_transporte',$hospedaje->id) }}" class="btn btn-success btn-round btn-just-icon" title="Hospedaje Transportes">
                                                                <i class="material-icons">directions_car</i>
                                                            </a>
                                                        @endif
                                                        @if(kvfj(Auth::user()->rol->permisos,'hospedajes_show'))
                                                            <a href="{{ route('hospedajes_show',$hospedaje->id) }}" class="btn btn-info btn-round btn-just-icon" title="Detalle hospedaje">
                                                                <i class="material-icons">visibility</i>
                                                            </a>
                                                        @endif
                                                        @if(kvfj(Auth::user()->rol->permisos,'categorias_edit'))
                                                            <a name="editar" href="{{ route('hospedajes_edit',$hospedaje->id) }}" class="btn btn-warning btn-round btn-just-icon" title="Editar hospedaje">
                                                                <i class="material-icons">mode_edit</i>
                                                            </a>
                                                        @endif
                                                        @if(kvfj(Auth::user()->rol->permisos,'hospedajes_destroy'))
                                                            <a name="eliminar" href="" data-target="#modal-delete-{{$hospedaje->id}}" data-toggle="modal" class="btn btn-danger btn-round btn-just-icon" title="Eliminar hospedaje">
                                                                <i class="material-icons">delete</i>
                                                            </a>
                                                        @endif                                                        
                                                    @else
                                                        @if(kvfj(Auth::user()->rol->permisos,'hospedajes_show'))
                                                            <a href="{{ route('hospedajes_show',$hospedaje->id) }}" class="btn btn-info btn-round btn-just-icon" title="Detalle hospedaje">
                                                                <i class="material-icons">visibility</i>
                                                            </a>
                                                        @endif
                                                    @endif
												</td>
											</tr>
											@include('hospedajes.modal')
										@endforeach
									@else
										<tr>
											<td colspan="12" style="text-align: center;">
												<h2><span class="badge badge-danger" style="font-size: 20px">No Existen hospedajes</span></h2>
											</td>
										</tr>
									@endif
								</tbody>
							</table>
							{{$hospedajes->appends(request()->all())->render()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection