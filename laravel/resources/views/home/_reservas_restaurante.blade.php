<table class="table table-light">
    <thead class="thead-light">
        <tr>
            <th>Cliente</th>
            <th>Fecha</th>
            <th>Hora de hospedaje</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($datos as $item)
            <tr>
                <td>{{$item->cliente?$item->cliente->nombrecompleto:'Sin cliente'}}</td>
                <td>{{$item->fecha}}</td>
                <td>{{$item->hora}}</td>
            </tr>
        @endforeach
    </tbody>
</table>