@extends ('layouts.admin')
@section('header')
    <!-- Content Header (Page header) -->
    <h3 class="m-0 text-dark">Listado de Clientes</h3>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-12">
                    <ol class="breadcrumb" style="background-color: inherit">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
                        <li class="breadcrumb-item active">Clientes</li>
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
                            {{-- @if(kvfj(Auth::user()->rol->permisos,'clientes_create')) --}}
                                <a class="btn btn-success" href="{{ route('clientes_create') }}" title="Nuevo cliente">
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
                                                @include('clientes.search')
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <table class="table table-striped table-bordered table-condensed">
                                <thead class="text-primary">
                                    <th>Id</th>
									<th>Cliente</th>
									<th>Telefonos</th>
									<th>Email</th>
									<th>Pais-ciudad</th>
									<th>Oficio</th>
									<th>Empresa</th>
									<th>Opciones</th>
                                </thead>
                               <tbody>
									@if(count($clientes))
										@foreach ($clientes as $cliente)
											<tr>
												<td>{{ $cliente->id }}</td>
												<td>{{ $cliente->nombres }} {{ $cliente->apellidos }}</td>
												<td>{{ $cliente->celular }} {{ $cliente->telefono }}</td>
												<td>{{ $cliente->email }}</td>
												<td>{{ $cliente->pais }} - {{ $cliente->ciudad }}</td>
												<td>{{ $cliente->oficio }}</td>
												<td>{{ $cliente->empresa }}</td>
												<td style="width: 250px; text-align: center;">
                                                    {{-- @if(kvfj(Auth::user()->rol->permisos,'clientes_show')) --}}
                                                        <a href="{{ route('clientes_show',$cliente->id) }}" class="btn btn-info btn-round btn-just-icon" title="Detalle cliente">
                                                            <i class="material-icons">visibility</i>
                                                        </a>
                                                    {{-- @endif --}}
													{{-- @if(kvfj(Auth::user()->rol->permisos,'clientes_edit')) --}}
														<a href="{{ route('clientes_edit',$cliente->id) }}" class="btn btn-warning btn-round btn-just-icon" title="Editar cliente">
															<i class="material-icons">mode_edit</i>
														</a>
													{{-- @endif --}}
													{{-- @if(kvfj(Auth::user()->rol->permisos,'clientes_destroy')) --}}
                                                        <a href="" data-target="#modal-delete-{{$cliente->id}}" data-toggle="modal"  class="btn btn-danger btn-round btn-just-icon" title="Eliminar cliente">
                                                            <i class="material-icons">delete</i>
                                                        </a>
													{{-- @endif --}}
												</td>
											</tr>
											@include('clientes.modal')
										@endforeach
									@else
										<tr>
											<td colspan="8" style="text-align: center;">
												<h2><span class="badge badge-danger" style="font-size: 20px">No Existen clientes</span></h2>
											</td>
										</tr>
									@endif
								</tbody>
                            </table>
                            {{$clientes->appends(request()->all())->render()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection