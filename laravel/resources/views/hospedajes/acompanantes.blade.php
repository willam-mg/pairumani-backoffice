<div class="card">
    <div class="card-header card-header-rose card-header-icon">
        <div class="card-icon">
            <i class="material-icons">assignment</i>
        </div>
    </div>
    <div class="card-body">
        <h3>Acompañantes</h3>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th>Acompañante</th>
                    <th>Opcion</th>
                </tr>
            </thead>
            <tbody>
                @if(count($detalles))
                    @foreach ($detalles as $detalle)
                        <tr>
                            <td>{{ $detalle->acompanante->nombre }}</td>
                            <td>
                                <form method="POST" action="{{ route('hospedajes_acompanante_destroy',[$hospedaje->id,$detalle->id,$detalle->acompanante_id]) }}">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-danger" type="submit">X</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="2" style="text-align: center;">
                            <h2><span class="badge badge-danger" style="font-size: 20px">No Existen acompanantes</span></h2>
                        </td>
                    </tr> 
                @endif
            </tbody>
        </table>
    </div>
</div>