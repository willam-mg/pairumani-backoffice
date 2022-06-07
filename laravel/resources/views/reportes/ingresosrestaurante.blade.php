@extends('layouts.admin')
@section('header')
    <!-- Content Header (Page header) -->
    <h3 class="m-0 text-dark">Reporte Ingresos Restaurante</h3>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-12">
                    <ol class="breadcrumb" style="background-color: inherit">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
                        <li class="breadcrumb-item active">Ingresos Restaurante</li>
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
                        <form method="POST" action="{{ route('reporte_ingresos_restaurante') }}">
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
                                    <a href="{{ route('reporte_ingresos_restaurante') }}" class="btn btn-warning">
                                        <i class="material-icons">autorenew</i> Limpiar
                                    </a>
                                    <a href="{{ route('reporte_restaurante',[$fecha_inicio,$fecha_fin]) }}" class="btn btn-info" target="_blank">
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
                                        <th>Habitacion</th>
                                        <th>Fecha</th>
                                        <th>Producto</th>
                                        <th>Opcion</th>
                                        <th>Tamaño</th>
                                        <th>Cantidad</th>
                                        <th>Precio Producto</th>
                                        <th>Precio Tamaño</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr style="font-size: 17px;color: black;background-color: skyblue">
                                        <td colspan="6">TOTALES</td>
                                        <td>{{ pageTotal($restaurantes,'cantidad') }}</td>
                                        <td>{{ env('MONEYLOCAL') }}{{ number_format(pageTotal($restaurantes,'precio'),2) }}</td>
                                        <td>{{ env('MONEYLOCAL') }}{{ number_format(pageTotal($restaurantes,'precio_tamanho'),2) }}</td>
                                        <td>{{ env('MONEYLOCAL') }}{{ number_format(pageTotal($restaurantes,'total'),2) }}</td>
                                    </tr>
                                </tfoot>
								<tbody>
                                    @foreach ($restaurantes as $restaurante)
                                        <tr>
                                            <td>{{ $restaurante->cliente }}</td>
                                            <td>{{ $restaurante->habitacion }}</td>
                                            <td>{{ $restaurante->fecha }}</td>
                                            <td>{{ $restaurante->producto }}</td>
                                            <td>{{ $restaurante->opcion }}</td>
                                            <td>{{ $restaurante->tamaño }}</td>
                                            <td>{{ $restaurante->cantidad }}</td>
                                            <td>{{ env('MONEYLOCAL') }}{{ number_format($restaurante->precio),2 }}</td>
                                            <td>{{ number_format($restaurante->precio_tamanho,2) }}</td>
                                            <td>{{ env('MONEYLOCAL') }}{{ number_format($restaurante->total,2) }}</td>
                                        </tr>
                                    @endforeach
								</tbody>
							</table>
							{{$restaurantes->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection