@csrf
<div class="card">
    <div class="card-header card-header-rose card-header-icon">
        <div class="card-icon">
            <i class="material-icons">assignment</i>
        </div>
    </div>
    <div class="card-body ">
        <div class="form-group bmd-form-group {{ $errors->has('nombre') ? 'has-danger' : '' }}">
            <label for="nombre" class="bmd-label-floating">Nombre</label>
            <input type="text" name="nombre" value="{{ old('nombre',$acompanante->nombre) }}" class="form-control">
            @if ($errors->has('nombre'))
                <span id="nombre-error" for="nombre" class="error">{{ $errors->first('nombre') }}</span>
            @endif
        </div>
        <div class="form-group bmd-form-group {{ $errors->has('tipo_documento') ? 'has-danger' : '' }}">
            <label for="tipo_documento">Tipo Documento</label>
            <select name="tipo_documento" class="form-control select2bs4">
                <option>Seleccione un documento</option>
                <option value="Ci" {{ old('tipo_documento', $acompanante->tipo_documento) == 'Ci' ? 'selected' : '' }}>Ci</option>
                <option value="Dni" {{ old('tipo_documento', $acompanante->tipo_documento) == 'Dni' ? 'selected' : '' }}>Dni</option>
                <option value="Pasaporte" {{ old('tipo_documento', $acompanante->tipo_documento) == 'Pasaporte' ? 'selected' : '' }}>Pasaporte</option>
            </select>
            @if ($errors->has('tipo_documento'))
                <span id="tipo_documento-error" for="tipo_documento" class="error">{{ $errors->first('tipo_documento') }}</span>
            @endif
        </div>
        <div class="form-group bmd-form-group {{ $errors->has('num_documento') ? 'has-danger' : '' }}">
            <label for="num_documento" class="bmd-label-floating">Num Documento</label>
            <input type="text" name="num_documento" value="{{ old('num_documento',$acompanante->num_documento) }}" class="form-control">
            @if ($errors->has('num_documento'))
                <span id="num_documento-error" for="num_documento" class="error">{{ $errors->first('num_documento') }}</span>
            @endif
        </div>
        <div class="form-group bmd-form-group {{ $errors->has('nacionalidad') ? 'has-danger' : '' }}">
            <label for="nacionalidad" class="bmd-label-floating">Nacionalidad</label>
            <input type="text" name="nacionalidad" value="{{ old('nacionalidad',$acompanante->nacionalidad) }}" class="form-control">
            @if ($errors->has('nacionalidad'))
                <span id="nacionalidad-error" for="nacionalidad" class="error">{{ $errors->first('nacionalidad') }}</span>
            @endif
        </div>
        <div class="form-group bmd-form-group {{ $errors->has('fecha_nacimiento') ? 'has-danger' : '' }}">
            <label for="fecha"><strong>Fecha Nacimiento</strong></label><br>
            <input type="date" name="fecha_nacimiento" value="{{ old('fecha_nacimiento',$acompanante->fecha_nacimiento) }}" class="form-control">
            @if ($errors->has('fecha_nacimiento'))
                <span id="fecha_nacimiento-error" for="fecha_nacimiento" class="error">{{ $errors->first('fecha_nacimiento') }}</span>
            @endif
        </div>
        <div class="form-group bmd-form-group {{ $errors->has('ciudad') ? 'has-danger' : '' }}">
            <label for="ciudad" class="bmd-label-floating">Ciudad</label>
            <input type="text" name="ciudad" value="{{ old('ciudad',$acompanante->ciudad) }}" class="form-control">
            @if ($errors->has('ciudad'))
                <span id="ciudad-error" for="ciudad" class="error">{{ $errors->first('ciudad') }}</span>
            @endif
        </div>
    </div>
    <div class="card-footer text-right">
        <div class="form-group">
            <button class="btn btn-primary" type="submit">
                <i class="material-icons">save</i> Guardar
            </button>
            @if($tipo == 'reserva')
                <a href="{{ route('reservas_hospedaje',[$categoria,$habitacion,$reserva]) }}" class="btn btn-danger">
                    <i class="material-icons">clear</i> Cancelar
                </a>
            @elseif($tipo == 'hospedaje' && !$hospedaje)
                <a href="{{ route('hospedajes_create') }}" class="btn btn-danger">
                    <i class="material-icons">clear</i> Cancelar
                </a>
            @elseif($tipo == 'hospedaje' && $hospedaje)
                <a href="{{ route('hospedajes_edit',$hospedaje) }}" class="btn btn-danger">
                    <i class="material-icons">clear</i> Cancelar
                </a>
            @elseif($tipo == 'promocion')
                <a href="{{ route('promocionreservas_hospedaje',[$promocion,$reserva]) }}" class="btn btn-danger">
                    <i class="material-icons">clear</i> Cancelar
                </a>
            @else
                <a href="{{ route('acompanantes_index',$cliente->id) }}" class="btn btn-danger">
                    <i class="material-icons">clear</i> Cancelar
                </a>
            @endif
        </div>
    </div>
</div>