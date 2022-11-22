<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reporte</title>
    <link rel="stylesheet" href="{{ asset('css/reporte.css') }}">
</head>

<body>
    <div class="size-middle-carta text-uppercase">
        <div class="card">
            <div class="card-content table-responsive">
                <h3 class="text-center">REPORTE INGRESOS RESTAURANTE</h3>
                <table class="table table-striped table-bordered table-condensed" style="font-size: 11px">
                    <thead class="thead-dark">
                        <tr>
                            <th>Cliente</th>
                            <th>Fecha</th>
                            <th>Producto</th>
                            <th>Cantidad</th>
                            <th>Precio P.</th>
                            <th>Precio T.</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($restaurantes as $restaurante)
                            <tr>
                                <td>{{ $restaurante->cliente }}</td>
                                <td>{{ $restaurante->fecha }}</td>
                                <td>{{ $restaurante->producto }}: {{ $restaurante->opcion }} - {{ $restaurante->tamaño }}</td>
                                <td>{{ $restaurante->cantidad }}</td>
                                <td width="12%">{{ env('MONEYLOCAL') }}{{ number_format($restaurante->precio),2 }}</td>
                                <td width="12%">{{ env('MONEYLOCAL') }}{{ number_format($restaurante->precio_tamanho,2) }}</td>
                                <td>{{ env('MONEYLOCAL') }}{{ number_format($restaurante->total,2) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr style="font-size: 12px;color: black;background-color: skyblue">
                            <td colspan="3">TOTALES</td>
                            <td>{{ pageTotal($restaurantes,'cantidad') }}</td>
                            <td>{{ env('MONEYLOCAL') }}{{ number_format(pageTotal($restaurantes,'precio'),2) }}</td>
                            <td>{{ env('MONEYLOCAL') }}{{ number_format(pageTotal($restaurantes,'precio_tamanho'),2) }}</td>
                            <td>{{ env('MONEYLOCAL') }}{{ number_format(pageTotal($restaurantes,'total'),2) }}</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</body>

</html>