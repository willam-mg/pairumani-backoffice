@csrf
<div class="card">
    <div class="card-header card-header-rose card-header-icon">
        <div class="card-icon">
            <i class="material-icons">assignment</i>
        </div>
    </div>
    <div class="card-body">
        <div class="form-group">
            <div class="form-group bmd-form-group {{ $errors->has('cliente_id') ? 'has-danger' : '' }}">
                <label for="cliente_id"><strong>Cliente</strong></label>
                <select name="cliente_id" class="form-control select2bs4">
                    <option>Seleccione un cliente</option>
                    @foreach ($clientes as $key => $value)
                        <option value="{{  $key }}" {{ old('cliente_id', $reserva->cliente_id) == $key ? 'selected' : '' }}>{{ $value }}</option>
                    @endforeach
                </select>
                @if ($errors->has('cliente_id'))
                    <span id="cliente_id-error" for="cliente_id" class="error">{{ $errors->first('cliente_id') }}</span>
                @endif
            </div>                
        </div>
        <div class="form-group bmd-form-group" style="margin-top: 20px;">
            <label>Lugar Turistico</label>
            <input disabled type="text" value="{{ $lugar->nombre }}" class="form-control">
        </div>
        <div class="form-group bmd-form-group" style="margin-top: 20px;">
            <label>Precio</label>
            <input disabled type="number" value="{{ $lugar->precio_recorrido }}" class="form-control">
        </div>
        <div class="form-group bmd-form-group" style="margin-top: 20px;">
            <label>Tipo</label>
            <input disabled type="text" value="{{ $lugar->tipo }}" class="form-control">
        </div>
        <div class="form-group bmd-form-group {{ $errors->has('fecha') ? 'has-danger' : '' }}">
            <label for="fecha"><strong>Fecha</strong></label><br>
            <input type="date" name="fecha" value="{{ old('fecha',$lugar->fecha) }}" class="form-control">
            @if ($errors->has('fecha'))
                <span id="fecha-error" for="fecha" class="error">{{ $errors->first('fecha') }}</span>
            @endif
        </div>
    </div>
    <div class="card-footer text-right">
        <div class="form-group">
            <button class="btn btn-primary" type="submit">
                <i class="material-icons">save</i> Guardar
            </button>
            <a href="{{ route('reservaslugaresturisticos_index',$lugar->id) }}" class="btn btn-danger">
                <i class="material-icons">clear</i> Cancelar
            </a>
        </div>
    </div>
</div>