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
            <input type="text" name="nombre" value="{{ old('nombre', $categoria->nombre) }}" class="form-control" autofocus>
            @if ($errors->has('nombre'))
                <span id="nombre-error" for="nombre" class="error">{{ $errors->first('nombre') }}</span>
            @endif
        </div>
        <div class="form-group bmd-form-group {{ $errors->has('descripcion') ? 'has-danger' : '' }}">
            <label for="descripcion"><strong>Descripcion</strong></label><br>
            <textarea name="descripcion" id="editor" class="form-control" cols="30" rows="10">{{ old('descripcion', $categoria->descripcion) }}</textarea>
            @if ($errors->has('descripcion'))
                <span id="descripcion-error" for="descripcion" class="error">{{ $errors->first('descripcion') }}</span>
            @endif
        </div>
        <div class="fileinput fileinput-new text-center" data-provides="fileinput">
            <h4 for="foto">Foto</h4>
            <div class="fileinput-new thumbnail">
                @if (($categoria->foto)!="")
                    <img src="{{ $categoria->fotourl }}" height="300px" width="300px">
                @else
                    <img src="{{asset('img/image_placeholder.jpg')}}" alt="...">
                @endif
            </div>
            <div class="fileinput-preview fileinput-exists thumbnail"></div>
            <div>
                <span class="btn btn-rose btn-round btn-file">
                    <span class="fileinput-new">Seleccione una imagen</span>
                    <span class="fileinput-exists">Change</span>
                    <input type="file" name="foto" value="{{ old('foto',$categoria->foto) }}">
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
    <div class="card-footer text-right">
        <div class="form-group">
            <button class="btn btn-primary" type="submit">
                <i class="material-icons">save</i> Guardar
            </button>
            <a href="{{ route('habitacioncategorias_index') }}" class="btn btn-danger">
                <i class="material-icons">clear</i> Cancelar
            </a>
        </div>
    </div>
</div>
@push('scripts')
    <script>
        $(function(){
            CKEDITOR.replace('editor');
        });
    </script>
@endpush