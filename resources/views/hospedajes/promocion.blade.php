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
                    <th>Precio</th>
                    <th>Habitación</th>
                </tr>
            </thead>
            <tbody id="promocion">
                @if(routerequest('hospedajes_edit') == 'true')
                    @if($hospedaje->habitacion->promocion != null)
                        <tr>
                            <td>{{ $hospedaje->habitacion->promocion->nombre }}</td>
                            <td>{{ $hospedaje->habitacion->promocion->precio }}</td>
                            <td>{{ $hospedaje->habitacion->num_habitacion }}</td>
                        </tr>                    
                    @endif
                @endif
            </tbody>
        </table>
    </div>
</div>