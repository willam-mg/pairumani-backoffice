@csrf
<div class="card">
    <div class="card-header card-header-rose card-header-icon">
        <div class="card-icon">
            <i class="material-icons">assignment</i>
        </div>
    </div>
    <div class="card-body ">
        <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
            <div class="form-group bmd-form-group {{ $errors->has('habitacion_id') ? 'has-danger' : '' }}">
                <label for="habitacion_id">Habitacion</label>
                <select name="habitacion_id" class="form-control select2bs4">
                    <option>Seleccione una habitacion</option>
                    @foreach ($habitaciones as $key => $value)
                        <option value="{{ $key }}" {{ old('habitacion_id', $promocion->habitacion_id) == $key ? 'selected' : '' }}>{{ $value }}</option>
                    @endforeach
                </select>
                @if ($errors->has('habitacion_id'))
                    <span id="habitacion_id-error" for="habitacion_id" class="error">{{ $errors->first('habitacion_id') }}</span>
                @endif
            </div>
        </div>
        <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
            <div class="form-group bmd-form-group {{ $errors->has('nombre') ? 'has-danger' : '' }}">
                <label for="nombre" class="bmd-label-floating">Nombre</label>
                <input type="text" name="nombre" value="{{ old('nombre', $promocion->nombre) }}" class="form-control" autofocus>
                @if ($errors->has('nombre'))
                    <span id="nombre-error" for="nombre" class="error">{{ $errors->first('nombre') }}</span>
                @endif
            </div>
        </div>
        <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
            <label for="descripcion"><strong>Descripcion</strong></label>
            <div class="form-group bmd-form-group {{ $errors->has('descripcion') ? 'has-danger' : '' }}">
                <textarea name="descripcion" id="editor" class="form-control" cols="30" rows="10">{{ old('descripcion', $promocion->descripcion) }}</textarea>
                @if ($errors->has('descripcion'))
                    <span id="descripcion-error" for="descripcion" class="error">{{ $errors->first('descripcion') }}</span>
                @endif
            </div>
        </div>
        <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
            <h4 for="foto">Foto</h4>
            <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                <div class="fileinput-new thumbnail">
                    @if (($promocion->foto)!="")
                        <img src="{{ $promocion->fotourl }}" height="300px" width="300px">
                    @else
                        <img src="{{asset('img/image_placeholder.jpg')}}" alt="...">
                    @endif
                </div>
                <div class="fileinput-preview fileinput-exists thumbnail"></div>
                <div>
                    <span class="btn btn-rose btn-round btn-file">
                        <span class="fileinput-new">Seleccione una imagen</span>
                        <span class="fileinput-exists">Change</span>
                        <input type="file" name="foto" value="{{ old('foto',$promocion->foto) }}">
                    </span>
                    <a href="#" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                </div>
                <div class="form-group {{ $errors->has('foto') ? 'has-danger' : '' }}">
                    @if ($errors->has('foto'))
                        <span id="foto-error" for="foto" class="error">{{ $errors->first('foto') }}</span>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
            <div class="form-group bmd-form-group {{ $errors->has('precio') ? 'has-danger' : '' }}">
                <label for="precio" class="bmd-label-floating">precio</label>
                <input type="number" min="1" name="precio" value="{{ old('precio', $promocion->precio) }}" class="form-control" autofocus>
                @if ($errors->has('precio'))
                    <span id="precio-error" for="precio" class="error">{{ $errors->first('precio') }}</span>
                @endif
            </div>
        </div>
        <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
            <div class="form-group bmd-form-group {{ $errors->has('estado') ? 'has-danger' : '' }}">
                <label for="estado">Estado</label>
                <select name="estado" class="form-control select2bs4">
                    <option>Seleccione un estado</option>
                    <option value="Activo" {{ old('estado', $promocion->estado) == 'Activo' ? 'selected' : '' }}>Activo</option>
                    <option value="Inactivo" {{ old('estado', $promocion->estado) == 'Inactivo' ? 'selected' : '' }}>Inactivo</option>
                </select>
                @if ($errors->has('estado'))
                    <span id="estado-error" for="estado" class="error">{{ $errors->first('estado') }}</span>
                @endif
            </div>
        </div>
    </div>
    <div class="card-footer text-right">
        <div class="form-group">
            <button class="btn btn-primary" type="submit">
                <i class="material-icons">save</i> Guardar
            </button>
            <a href="{{ route('promociones_index') }}" class="btn btn-danger">
                <i class="material-icons">clear</i> Cancelar
            </a>
        </div>
    </div>
</div>
@push('scripts')
    <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
    <script>
        $(function(){
            CKEDITOR.replace('editor');
        });
    </script>
@endpush