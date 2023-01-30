<div class="mb-3">
    <img src="{{ $habitacion->fotourl }}" alt="{{ $habitacion->nombre }}" width="100%" height="auto">
</div>
<table class="table table-striped table-bordered">
    <tbody>
        <tr>
            <th>Nombre</th>
            <td>{{ $habitacion->nombre }}</td>
        </tr>
        <tr>
            <th>Num habitacion</th>
            <td>{{ $habitacion->num_habitacion }}</td>
        </tr>
        <tr>
            <th>Categoria</th>
            <td>{{ $habitacion->categoria->nombre }}</td>
        </tr>
        <tr>
            <th>Descripcion</th>
            <td>{!! $habitacion->descripcion !!}</td>
        </tr>
        <tr>
            <th>Precio</th>
            <td>{{ $habitacion->precio }}</td>
        </tr>
        <tr>
            <th>Capacidad Minima</th>
            <td>{{ $habitacion->capacidad_minima }}</td>
        </tr>
        <tr>
            <th>Estado</th>
            <td>{{ $habitacion->estado }}</td>
        </tr>
    </tbody>
</table>