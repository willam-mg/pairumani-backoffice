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
                <input type="text" name="nombre" value="{{ old('nombre', $producto->nombre) }}" class="form-control" autofocus>
                @if ($errors->has('nombre'))
                    <span id="nombre-error" for="nombre" class="error">{{ $errors->first('nombre') }}</span>
                @endif
            </div>
        </div>
        <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
            <div class="form-group bmd-form-group {{ $errors->has('precio') ? 'has-danger' : '' }}">
                <label for="precio" class="bmd-label-floating">Precio</label>
                <input type="number" min="1" name="precio" value="{{ old('precio', $producto->precio) }}" class="form-control" autofocus>
                @if ($errors->has('precio'))
                    <span id="precio-error" for="precio" class="error">{{ $errors->first('precio') }}</span>
                @endif
            </div>
        </div>
        <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
            <label for="descripcion"><strong>Descripcion</strong></label>
            <div class="form-group bmd-form-group {{ $errors->has('descripcion') ? 'has-danger' : '' }}">
                <textarea name="descripcion" id="editor" class="form-control" cols="30" rows="10">{{ old('descripcion', $producto->descripcion) }}</textarea>
                @if ($errors->has('descripcion'))
                    <span id="descripcion-error" for="descripcion" class="error">{{ $errors->first('descripcion') }}</span>
                @endif
            </div>
        </div>
        <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
            <h4 for="foto">Foto</h4>
            <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                <div class="fileinput-new thumbnail">
                    @if (($producto->foto)!="")
                        <img src="{{ $producto->fotourl }}" height="300px" width="300px">
                    @else
                        <img src="{{asset('img/image_placeholder.jpg')}}" alt="...">
                    @endif
                </div>
                <div class="fileinput-preview fileinput-exists thumbnail"></div>
                <div>
                    <span class="btn btn-rose btn-round btn-file">
                        <span class="fileinput-new">Seleccione una imagen</span>
                        <span class="fileinput-exists">Change</span>
                        <input type="file" name="foto" value="{{ old('foto',$producto->foto) }}">
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
    </div>
    <div class="card-footer text-right">
        <div class="form-group">
            <button class="btn btn-primary" type="submit">
                <i class="material-icons">save</i> Guardar
            </button>
            <a href="{{ route('productos_index',$categoria->id) }}" class="btn btn-danger">
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