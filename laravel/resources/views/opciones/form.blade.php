@csrf
<div class="card">
    <div class="card-header card-header-rose card-header-icon">
        <div class="card-icon">
            <i class="material-icons">assignment</i>
        </div>
    </div>
    <div class="card-body ">
        <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
            <div class="form-group bmd-form-group {{ $errors->has('nombre') ? 'has-danger' : '' }}">
                <label for="nombre" class="bmd-label-floating">Nombre</label>
                <input type="text" name="nombre" value="{{ old('nombre',$opcion->nombre) }}" class="form-control">
                @if ($errors->has('nombre'))
                    <span id="nombre-error" for="nombre" class="error">{{ $errors->first('nombre') }}</span>
                @endif
            </div>
        </div>
    </div>
    <div class="card-footer text-right">
        <div class="form-group">
            <button class="btn btn-primary" type="submit">
                <i class="material-icons">save</i> Guardar
            </button>
            <a href="{{ route('opciones_index',[$categoria->id,$producto->id]) }}" class="btn btn-danger">
                <i class="material-icons">clear</i> Cancelar
            </a>
        </div>
    </div>
</div>