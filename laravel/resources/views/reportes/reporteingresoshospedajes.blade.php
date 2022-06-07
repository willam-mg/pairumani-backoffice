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
                <h3 class="text-center">REPORTE INGRESOS HOSPEDAJE</h3>
                <table class="table table-striped table-bordered table-condensed" style="font-size: 12px">
                    <thead>
                        <tr>
                            <th>Cliente</th>
                            <th>Habitacion</th>
                            <th>Checkin</th>
                            <th>Checkout</th>
                            <th>Precio</th>
                            <th>Precio Promocion</th>
                        </tr>
                    </thead>                    
                    <tbody>
                        @foreach ($hospedajes as $hospedaje)
                            <tr>
                                <td>{{ $hospedaje->cliente->nombres }} {{ $hospedaje->cliente->apellidos }}</td>
                                <td>{{ $hospedaje->habitacion->nombre }}</td>
                                <td>{{ $hospedaje->fecha_checkin }}</td>
                                <td>{{ $hospedaje->fecha_checkout }}</td>
                                <td>{{ env('MONEYLOCAL') }}{{ number_format($hospedaje->precio),2 }}</td>
                                <td>{{ env('MONEYLOCAL') }}{{ number_format($hospedaje->precio_promocion ? $hospedaje->precio_promocion : '0',2) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr style="color: black;background-color: skyblue">
                            <td colspan="4"><strong>TOTALES</strong></td>
                            <td>{{ env('MONEYLOCAL') }}{{ number_format(pageTotal($hospedajes,'precio'),2) }}</td>
                            <td>{{ env('MONEYLOCAL') }}{{ number_format(pageTotal($hospedajes,'precio_promocion'),2) }}</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</body>
</html>