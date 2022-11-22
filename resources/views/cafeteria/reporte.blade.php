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
                <table class="table table-bordered text-uppercase">
                    <tbody>
                        <tr>
                            <td style="width:200px;">
                                
                            </td>
                            <td class="text-center text-uppercase" style="width:300px;">
                                <h3>Recibo</h3>
                            </td>
                            <td class="text-center">
                                N° {{ $cafeteria->id }} <br>
                                Cochabamba - Bolivia <br>
                                {{ $cafeteria->fecha }} {{ $cafeteria->hora }}
                            </td>
                        </tr>
                        <tr>
                            <td class="text-uppercase" colspan="3">
                                Cliente: {{ $cafeteria->hospedaje ? $cafeteria->hospedaje->cliente->nombrecompleto : $cafeteria->cliente->nombrecompleto }} <br>
                                Email: {{ $cafeteria->hospedaje ? $cafeteria->hospedaje->cliente->email : $cafeteria->cliente->email }}
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <table class="table" style="font-size: 12px;">
                                    <thead>
                                        <tr>
                                            <th class="text-uppercase">Producto</th>
                                            <th class="text-uppercase">Precio P.</th>
                                            <th class="text-uppercase">Opcion</th>
                                            <th class="text-uppercase">Tamaño</th>
                                            <th class="text-uppercase">Precio T.</th>
                                            <th class="text-uppercase">Cantidad</th>
                                            <th class="text-uppercase">Subtotal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($cafeteria->detalles as $detalle)
                                            <tr>
                                                <td class="text-uppercase">{{ $detalle->producto->nombre }}</td>
                                                <td class="text-uppercase">{{ env('MONEYLOCAL') }} {{ $detalle->producto->precio }}</td>
                                                <td class="text-uppercase">{{ $detalle->detalleproducto->opcion->nombre }}</td>
                                                <td class="text-uppercase">{{ $detalle->detalleproducto->tamaño->nombre }}</td>
                                                <td class="text-uppercase">{{ env('MONEYLOCAL') }} {{ number_format($detalle->detalleproducto->tamaño->precio,2) }}</td>
                                                <td class="text-uppercase">{{ $detalle->cantidad }}</td>
                                                <td class="text-uppercase">{{ ($detalle->precio + $detalle->detalleproducto->precio_tamanho) * $detalle->cantidad }}</td>
                                            </tr>                                            
                                        @endforeach
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2"></td>
                            <td class="text-uppercase" style="font-size: 12px">
                                Total venta: {{ env('MONEYLOCAL') }} {{ number_format($cafeteria->total,2) }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>