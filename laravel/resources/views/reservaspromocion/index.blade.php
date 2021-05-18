@extends ('layouts.admin')
@section('header')
    <!-- Content Header (Page header) -->
    <h3 class="m-0 text-dark">Listado de Promocion Reservas</h3>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-12">
                    <ol class="breadcrumb" style="background-color: inherit">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('promociones_index') }}">Promociones</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('promociones_show',$promocion->id) }}">Promocion: {{ $promocion->nombre }}</a></li>
                        <li class="breadcrumb-item active">Promocion Reservas</li>
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
                            {{-- @if(kvfj(Auth::user()->rol->permisos,'promocionreservas_create')) --}}
                                <a class="btn btn-success" href="{{ route('promocionreservas_create',$promocion->id) }}" title="Nueva reserva">
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
                                                @include('reservaspromocion.search')
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <table class="table table-striped table-bordered table-condensed">
                                <thead class="text-primary">
                                    <th>Id</th>
                                    <th>Checkin</th>
									<th>Checkout</th>
									<th>Adultos</th>
                                    <th>Niños</th>
                                    <th>Cliente</th>
                                    <th>Habitacion</th>
									<th>Num Habitacion</th>
									<th>Opciones</th>
                                </thead>
                               <tbody>
									@if(count($reservas))
										@foreach ($reservas as $reserva)
											<tr>
												<td>{{ $reserva->id }}</td>
												<td>{{ $reserva->checkin }}</td>
												<td>{{ $reserva->checkout }}</td>
												<td>{{ $reserva->adultos }}</td>
												<td>{{ $reserva->niños }}</td>
												<td>{{ $reserva->cliente->nombrecompleto }}</td>
												<td>{{ $reserva->habitacion->nombre }}</td>
												<td>{{ $reserva->habitacion->num_habitacion }}</td>
												<td style="width: 250px; text-align: center;">
                                                    {{-- @if(kvfj(Auth::user()->rol->permisos,'promocionreservas_show')) --}}
                                                        <a href="{{ route('promocionreservas_show',[$promocion->id,$reserva->id]) }}" class="btn btn-info btn-round btn-just-icon" title="Detalle reserva">
                                                            <i class="material-icons">visibility</i>
                                                        </a>
                                                    {{-- @endif --}}
                                                    @if($reserva->habitacion->estado != 'Ocupado')
                                                        {{-- @if(kvfj(Auth::user()->rol->permisos,'promocionreservas_hospedaje')) --}}
                                                            {{-- <a href="{{ route('promocionreservas_hospedaje',[$promocion->id,$reserva->id]) }}" class="btn btn-success btn-round btn-just-icon" title="Reserva hospedaje">
                                                                <i class="material-icons">hotel</i>
                                                            </a>                                                             --}}
                                                        {{-- @endif --}}
                                                        {{-- @if(kvfj(Auth::user()->rol->permisos,'promocionreservas_edit')) --}}
                                                            <a href="{{ route('promocionreservas_edit',[$promocion->id,$reserva->id]) }}" class="btn btn-warning btn-round btn-just-icon" title="Editar reserva">
                                                                <i class="material-icons">mode_edit</i>
                                                            </a>
                                                        {{-- @endif --}}
                                                        {{-- @if(kvfj(Auth::user()->rol->permisos,'promocionreservas_destroy')) --}}
                                                            <a href="" data-target="#modal-delete-{{$reserva->id}}" data-toggle="modal"  class="btn btn-danger btn-round btn-just-icon" title="Eliminar reserva">
                                                                <i class="material-icons">delete</i>
                                                            </a>
                                                        {{-- @endif --}}
                                                    @endif
												</td>
											</tr>
											@include('reservaspromocion.modal')
										@endforeach
									@else
										<tr>
											<td colspan="9" style="text-align: center;">
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