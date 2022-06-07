@extends ('layouts.admin')
@section('header')
    <!-- Content Header (Page header) -->
    <h3 class="m-0 text-dark">Listado de Eventos</h3>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-12">
                    <ol class="breadcrumb" style="background-color: inherit">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
                        <li class="breadcrumb-item active">Eventos</li>
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
                            @if(kvfj(Auth::user()->rol->permisos,'eventos_create'))
                                <a class="btn btn-success" href="{{ route('eventos_create') }}" title="Nuevo evento">
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
                                                @include('eventos.search')
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <table class="table table-striped table-bordered table-condensed">
                                <thead class="text-primary">
                                    <th>Id</th>
                                    <th>Foto</th>
									<th>evento</th>
									<th>Fecha</th>
									<th>Opciones</th>
                                </thead>
                               <tbody>
									@if(count($eventos))
										@foreach ($eventos as $evento)
											<tr>
												<td>{{ $evento->id }}</td>
												<td>
                                                    <img src="{{ $evento->fotourl }}" alt="{{ $evento->nombre }}" height="120px" width="120px" class="img-">
                                                </td>
												<td>{{ $evento->nombre }}</td>
												<td>{{ \Carbon\Carbon::parse(strtotime($evento->fecha))->formatLocalized('%d de %B del %Y') }}</td>
												<td style="width: 250px; text-align: center;">
                                                    @if(kvfj(Auth::user()->rol->permisos,'eventos_galeria'))
                                                        <a href="{{ route('eventos_galeria',$evento->id) }}" class="btn btn-success btn-round btn-just-icon" title="Galeria evento">
                                                            <i class="material-icons">photo_size_select_actual</i>
                                                        </a>
                                                    @endif
                                                    @if(kvfj(Auth::user()->rol->permisos,'eventos_show'))
                                                        <a href="{{ route('eventos_show',$evento->id) }}" class="btn btn-info btn-round btn-just-icon" title="Detalle evento">
                                                            <i class="material-icons">visibility</i>
                                                        </a>
                                                    @endif
													@if(kvfj(Auth::user()->rol->permisos,'eventos_edit'))
														<a href="{{ route('eventos_edit',$evento->id) }}" class="btn btn-warning btn-round btn-just-icon" title="Editar evento">
															<i class="material-icons">mode_edit</i>
														</a>
													@endif
													@if(kvfj(Auth::user()->rol->permisos,'eventos_destroy'))
                                                        <a href="" data-target="#modal-delete-{{$evento->id}}" data-toggle="modal"  class="btn btn-danger btn-round btn-just-icon" title="Eliminar evento">
                                                            <i class="material-icons">delete</i>
                                                        </a>
													@endif
												</td>
											</tr>
											@include('eventos.modal')
										@endforeach
									@else
										<tr>
											<td colspan="5" style="text-align: center;">
												<h2><span class="badge badge-danger" style="font-size: 20px">No Existen eventos</span></h2>
											</td>
										</tr>
									@endif
								</tbody>
                            </table>
                            {{$eventos->appends(request()->all())->render()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection