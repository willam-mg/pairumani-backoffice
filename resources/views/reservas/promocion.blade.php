<div class="card">
    <div class="card-header card-header-rose card-header-icon">
        <div class="card-icon">
            <i class="material-icons">assignment</i>
        </div>
    </div>
    <div class="card-body">
        <h3>Promoción</h3>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th>Promocion</th>
                    <th>Descripcion</th>
                    <th>Precio</th>
                    <th>Habitación</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $habitacion->promocion->nombre }}</td>
                    <td>{!! $habitacion->promocion->descripcion !!}</td>
                    <td>{{ $habitacion->promocion->precio }}</td>
                    <td>{{ $habitacion->promocion->habitacion->nombre }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>