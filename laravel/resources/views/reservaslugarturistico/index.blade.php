@extends ('layouts.admin')
@section('header')
    <!-- Content Header (Page header) -->
    <h3 class="m-0 text-dark">Listado de Reservas Lugares Turisticos</h3>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-12">
                    <ol class="breadcrumb" style="background-color: inherit">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('lugaresturisticos_index') }}">Lugares Turisticos</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('lugaresturisticos_show',$lugar->id) }}">Lugar Turistico: {{ $lugar->nombre }}</a></li>
                        <li class="breadcrumb-item active">Reservas Lugares Turisticos</li>
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
                            @if(kvfj(Auth::user()->rol->permisos,'reservaslugaresturisticos_create'))
                                <a class="btn btn-success" href="{{ route('reservaslugaresturisticos_create',$lugar->id) }}" title="Nueva reserva">
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
									<th>Lugar Turistico</th>
                                    <th>Precio</th>
                                    <th>Hospedaje</th>
                                    <th>Estado</th>
									<th>Opciones</th>
                                </thead>
                               <tbody>
									@if(count($reservas))
										@foreach ($reservas as $reserva)
											<tr>
												<td>{{ $reserva->id }}</td>
												<td>{{ $reserva->hospedaje ? $reserva->hospedaje->cliente->nombrecompleto : $reserva->cliente->nombrecompleto }}</td>
												<td>{{ $reserva->fecha }}</td>
												<td>{{ $reserva->lugarturistico->nombre }}</td>
												<td>{{ $reserva->precio }}</td>
												<td>
                                                    {{ $reserva->hospedaje ? $reserva->hospedaje->id : '(ND)' }}
                                                </td>
												<td>{{ $reserva->estado }}</td>
												<td style="width: 250px; text-align: center;">                                                    
                                                    @if(!$reserva->hospedaje)
                                                        @if(kvfj(Auth::user()->rol->permisos,'reservaslugaresturisticos_hospedaje'))
                                                            <a href="{{ route('reservaslugaresturisticos_hospedaje',[$lugar->id,$reserva->id]) }}" class="btn btn-success btn-round btn-just-icon" title="Asignación hospedaje">
                                                                <i class="material-icons">hotel</i>
                                                            </a>
                                                        @endif                                                        
                                                        @if(kvfj(Auth::user()->rol->permisos,'reservaslugaresturisticos_edit'))
                                                            <a href="{{ route('reservaslugaresturisticos_edit',[$lugar->id,$reserva->id]) }}" class="btn btn-warning btn-round btn-just-icon" title="Editar reserva">
                                                                <i class="material-icons">mode_edit</i>
                                                            </a>
                                                        @endif
                                                    @endif
                                                    @if(kvfj(Auth::user()->rol->permisos,'reservaslugaresturisticos_show'))
                                                        <a href="{{ route('reservaslugaresturisticos_show',[$lugar->id,$reserva->id]) }}" class="btn btn-info btn-round btn-just-icon" title="Detalle reserva">
                                                            <i class="material-icons">visibility</i>
                                                        </a>
                                                    @endif
                                                    @if(kvfj(Auth::user()->rol->permisos,'reservaslugaresturisticos_destroy'))
                                                        <a href="" data-target="#modal-delete-{{$reserva->id}}" data-toggle="modal"  class="btn btn-danger btn-round btn-just-icon" title="Eliminar reserva">
                                                            <i class="material-icons">delete</i>
                                                        </a>
                                                    @endif
												</td>
											</tr>
											@include('reservaslugarturistico.modal')
										@endforeach
									@else
										<tr>
											<td colspan="8" style="text-align: center;">
												<h2><span class="badge badge-danger" style="font-size: 20px">No Existen reservas</span></h2>
											</td>
										</tr>
									@endif
								</tbody>
                            </table>
                            {{$reservas->appends(request()->all())->render()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection