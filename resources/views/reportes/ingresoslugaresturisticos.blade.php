@extends('layouts.admin')
@section('header')
    <!-- Content Header (Page header) -->
    <h3 class="m-0 text-dark">Reporte Ingresos Lugares Turisticos</h3>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-12">
                    <ol class="breadcrumb" style="background-color: inherit">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
                        <li class="breadcrumb-item active">Ingresos Lugares Turisticos</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div>
    </div>
    <!-- /.content-header -->
@endsection
@section('contenido')
    <div class="content">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{ route('reporte_ingresos_lugaresturisticos') }}">
                            @csrf
                            <div class="row mb-5">
                                <div class="col-4">
                                    <div class="form-group">
                                        <label>Fecha Inicio</label>
                                        <input type="date" name="fecha_inicio" class="form-control" value="{{ $fecha_inicio }}">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label>Fecha fin</label>
                                        <input type="date" name="fecha_fin" class="form-control" value="{{ $fecha_fin }}">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <button type="submit" class="btn btn-primary"><i class="material-icons">search</i> Buscar</button>
                                    <a href="{{ route('reporte_ingresos_lugaresturisticos') }}" class="btn btn-warning">
                                        <i class="material-icons">autorenew</i> Limpiar
                                    </a>
                                    <a href="{{ route('reporte_lugaresturisticos',[$fecha_inicio,$fecha_fin]) }}" class="btn btn-info" target="_blank">
                                        <i class="material-icons">print</i> Imprimir
                                    </a>
                                </div>
                            </div>
                        </form>
                        <div class="table-responsive">
							<table class="table table-striped table-bordered table-condensed">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>Cliente</th>
                                        <th>Fecha</th>
                                        <th>Lugar Turistico</th>
                                        <th>Tipo</th>
                                        <th>Precio</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr style="font-size: 17px;color: black;background-color: skyblue">
                                        <td colspan="4"><strong>TOTALES</strong></td>
                                        <td>{{ env('MONEYLOCAL') }}{{ number_format(pageTotal($lugares,'precio'),2) }}</td>
                                    </tr>
                                </tfoot>
								<tbody>
                                    @foreach ($lugares as $lugar)
                                        <tr>
                                            <td>{{ $lugar->hospedaje ? $lugar->hospedaje->cliente->nombrecompleto : $lugar->cliente->nombrecompleto }}</td>
                                            <td>{{ $lugar->fecha }}</td>
                                            <td>{{ $lugar->lugarturistico->nombre }}</td>
                                            <td>{{ $lugar->lugarturistico->tipo }}</td>
                                            <td>{{ env('MONEYLOCAL') }}{{ number_format($lugar->precio),2 }}</td>
                                        </tr>
                                    @endforeach
								</tbody>
							</table>
							{{$lugares->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection