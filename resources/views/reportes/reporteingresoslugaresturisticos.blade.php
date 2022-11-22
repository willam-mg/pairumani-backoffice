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
                <h3 class="text-center">REPORTE INGRESOS LUGARES TURISTICOS</h3>
                <table class="table table-striped table-bordered table-condensed" style="font-size: 13px">
                    <thead>
                        <tr>
                            <th>Cliente</th>
                            <th>Fecha</th>
                            <th>Lugar Turistico</th>
                            <th>Tipo</th>
                            <th>Precio</th>
                        </tr>
                    </thead>                    
                    <tbody>
                        @foreach ($lugares as $lugar)
                            <tr>
                                <td>{{ $lugar->hospedaje ? $lugar->hospedaje->cliente->nombrecompleto : $lugar->cliente->nombrecompleto }}</td>
                                <td width="15%">{{ $lugar->fecha }}</td>
                                <td>{{ $lugar->lugarturistico->nombre }}</td>
                                <td>{{ $lugar->lugarturistico->tipo }}</td>
                                <td width="17%">{{ env('MONEYLOCAL') }}{{ number_format($lugar->precio),2 }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr class="text-center" style="font-size: 17px;color: black;background-color: skyblue">
                            <td colspan="4"><strong>TOTALES</strong></td>
                            <td>{{ env('MONEYLOCAL') }}{{ number_format(pageTotal($lugares,'precio'),2) }}</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</body>
</html>