<div class="card">
    <div class="card-header card-header-rose card-header-icon">
        <div class="card-icon">
            <i class="material-icons">assignment</i>
        </div>
    </div>
    <div class="card-body">
        <h3>
            Acompañantes
            <div id="creara"></div>
            {{-- <button class="btn btn-success" onclick="createacompanante({{$tipo}},{{$promocion->id}})" style="margin-top: 25px">Nuevo Acompañante</button> --}}
        </h3>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th>Acompañante</th>
                    <th>Nacionalidad</th>
                </tr>
            </thead>
            <tbody id="acompañantes"></tbody>
        </table>
    </div>
</div>