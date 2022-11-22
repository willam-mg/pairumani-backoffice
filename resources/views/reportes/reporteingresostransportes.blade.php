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
                <h3 class="text-center">REPORTE INGRESOS TRANSPORTES</h3>
                <table class="table table-striped table-bordered table-condensed" style="font-size: 12px">
                    <thead>
                        <tr>
                            <th>Cliente</th>
                            <th>Transporte</th>
                            <th>Fecha</th>
                            <th>Precio</th>
                        </tr>
                    </thead>                    
                    <tbody>
                        @foreach ($transportes as $transporte)
                            <tr>
                                <td>{{ $transporte->hospedaje->cliente->nombrecompleto }}</td>
                                <td>{{ $transporte->transporte->nombre }}</td>
                                <td>{{ $transporte->fecha }}</td>
                                <td>{{ env('MONEYLOCAL') }}{{ number_format($transporte->precio),2 }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr class="text-center" style="font-size: 17px;color: black;background-color: skyblue">
                            <td colspan="3"><strong>TOTALES</strong></td>
                            <td>{{ env('MONEYLOCAL') }}{{ number_format(pageTotal($transportes,'precio'),2) }}</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</body>
</html>