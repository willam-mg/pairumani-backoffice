<table class="table table-light">
    <thead class="thead-light">
        <tr>
            <th>Checkin</th>
            <th>Checkout</th>
            <th>Cliente</th>
            <th>Habitacion</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($datos as $item)
            <tr>
                <td>{{$item->checkin}}</td>
                <td>{{$item->checkout}}</td>
                <td>{{$item->cliente?$item->cliente->nombrecompleto:'Sin cliente'}}</td>
                <td>{{$item->habitacion?$item->habitacion->num_habitacion:'Sin habitacion'}}</td>
            </tr>
        @endforeach
    </tbody>
</table>