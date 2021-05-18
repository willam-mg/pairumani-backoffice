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
                <input type="text" name="nombre" value="{{ old('nombre', $evento->nombre) }}" class="form-control" autofocus>
                @if ($errors->has('nombre'))
                    <span id="nombre-error" for="nombre" class="error">{{ $errors->first('nombre') }}</span>
                @endif
            </div>
        </div>
        <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
            <label for="descripcion"><strong>Descripcion</strong></label>
            <div class="form-group bmd-form-group {{ $errors->has('descripcion') ? 'has-danger' : '' }}">
                <textarea name="descripcion" id="editor" class="form-control" cols="30" rows="10">{{ old('descripcion', $evento->descripcion) }}</textarea>
                @if ($errors->has('descripcion'))
                    <span id="descripcion-error" for="descripcion" class="error">{{ $errors->first('descripcion') }}</span>
                @endif
            </div>
        </div>
        <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
            <h4 for="foto">Foto</h4>
            <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                <div class="fileinput-new thumbnail">
                    @if (($evento->foto)!="")
                        <img src="{{ $evento->fotourl }}" height="300px" width="300px">
                    @else
                        <img src="{{asset('img/image_placeholder.jpg')}}" alt="...">
                    @endif
                </div>
                <div class="fileinput-preview fileinput-exists thumbnail"></div>
                <div>
                    <span class="btn btn-rose btn-round btn-file">
                        <span class="fileinput-new">Seleccione una imagen</span>
                        <span class="fileinput-exists">Change</span>
                        <input type="file" name="foto" value="{{ old('foto',$evento->foto) }}">
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
            <div class="form-group bmd-form-group {{ $errors->has('fecha') ? 'has-danger' : '' }}">
                <label for="fecha" class="bmd-label-floating">Fecha</label>
                <input type="date" name="fecha" value="{{ old('fecha',$evento->fecha) }}" class="form-control">
                @if ($errors->has('fecha'))
                    <span id="fecha-error" for="fecha" class="error">{{ $errors->first('fecha') }}</span>
                @endif
            </div>
        </div>
    </div>
    <div class="card-footer text-right">
        <div class="form-group">
            <button class="btn btn-primary" type="submit">
                <i class="material-icons">save</i> Guardar
            </button>
            <a href="{{ route('eventos_index') }}" class="btn btn-danger">
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