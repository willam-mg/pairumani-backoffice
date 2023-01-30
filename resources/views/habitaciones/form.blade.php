@csrf
<div class="card">
    <div class="card-header card-header-rose card-header-icon">
        <div class="card-icon">
            <i class="material-icons">assignment</i>
        </div>
    </div>
    <div class="card-body ">
        <div class="form-group bmd-form-group {{ $errors->has('habitacion_categoria_id') ? 'has-danger' : '' }}">
            <label for="habitacion_categoria_id">Categoria</label>
            <select name="habitacion_categoria_id" class="form-control select2bs4">
                <option>Seleccione una categoria</option>
                @foreach ($categorias as $item)
                    <option value="{{$item->id}}" {{ $item->id==$habitacion->habitacion_categoria_id ? 'selected' : '' }}> {{$item->nombre}} </option>
                @endforeach
            </select>
            @if ($errors->has('habitacion_categoria_id'))
            <span id="habitacion_categoria_id-error" for="habitacion_categoria_id" class="error">{{ $errors->first('habitacion_categoria_id') }}</span>
            @endif
        </div>
        <div class="form-group bmd-form-group {{ $errors->has('nombre') ? 'has-danger' : '' }}">
            <label for="nombre" class="bmd-label-floating">Nombre</label>
            <input type="text" name="nombre" value="{{ old('nombre', $habitacion->nombre) }}" class="form-control" autofocus>
            @if ($errors->has('nombre'))
                <span id="nombre-error" for="nombre" class="error">{{ $errors->first('nombre') }}</span>
            @endif
        </div>
        <div class="form-group bmd-form-group {{ $errors->has('num_habitacion') ? 'has-danger' : '' }}">
            <label for="num_habitacion" class="bmd-label-floating">Num Habitacion</label>
            <input type="text" name="num_habitacion" value="{{ old('num_habitacion', $habitacion->num_habitacion) }}" class="form-control" autofocus>
            @if($errors->has('num_habitacion'))
                <span id="num_habitacion-error" for="num_habitacion" class="error">{{ $errors->first('num_habitacion') }}</span>
            @endif
        </div>
        <div class="form-group bmd-form-group {{ $errors->has('precio') ? 'has-danger' : '' }}">
            <label for="precio" class="bmd-label-floating">Precio</label>
            <input type="number" min="1" name="precio" value="{{ old('precio', $habitacion->precio) }}" class="form-control" autofocus>
            @if ($errors->has('precio'))
                <span id="precio-error" for="precio" class="error">{{ $errors->first('precio') }}</span>
            @endif
        </div>
        <div class="form-group bmd-form-group {{ $errors->has('capacidad_minima') ? 'has-danger' : '' }}">
            <label for="capacidad_minima" class="bmd-label-floating">Capacidad Minima</label>
            <input type="number" min="1" name="capacidad_minima" value="{{ old('capacidad_minima', $habitacion->capacidad_minima) }}" class="form-control" autofocus>
            @if ($errors->has('capacidad_minima'))
                <span id="capacidad_minima-error" for="capacidad_minima" class="error">{{ $errors->first('capacidad_minima') }}</span>
            @endif
        </div>
        <div class="form-group bmd-form-group {{ $errors->has('capacidad_maxima') ? 'has-danger' : '' }}">
            <label for="capacidad_maxima" class="bmd-label-floating">Capacidad Maxima</label>
            <input type="number" min="1" name="capacidad_maxima" value="{{ old('capacidad_maxima', $habitacion->capacidad_maxima) }}" class="form-control" autofocus>
            @if ($errors->has('capacidad_maxima'))
                <span id="capacidad_maxima-error" for="capacidad_maxima" class="error">{{ $errors->first('capacidad_maxima') }}</span>
            @endif
        </div>
        <div class="form-group bmd-form-group {{ $errors->has('estado') ? 'has-danger' : '' }}">
            <label for="estado">Estado</label>
            <select name="estado" class="form-control select2bs4">
                <option>Seleccione un estado</option>
                <option value="Disponible" {{ old('estado', $habitacion->estado) == 'Disponible' ? 'selected' : '' }}>Disponible</option>
                <option value="Ocupado" {{ old('estado', $habitacion->estado) == 'Ocupado' ? 'selected' : '' }}>Ocupado</option>
                <option value="Reservado" {{ old('estado', $habitacion->estado) == 'Reservado' ? 'selected' : '' }}>Reservado</option>
                <option value="Limpieza" {{ old('estado', $habitacion->estado) == 'Limpieza' ? 'selected' : '' }}>Limpieza</option>
            </select>
            @if ($errors->has('estado'))
                <span id="estado-error" for="estado" class="error">{{ $errors->first('estado') }}</span>
            @endif
        </div>
        <div class="form-group bmd-form-group {{ $errors->has('descripcion') ? 'has-danger' : '' }}">
            <label for="descripcion"><strong>Descripcion</strong></label><br>
            <textarea name="descripcion" id="editor" class="form-control" cols="30" rows="10">{{ old('descripcion', $habitacion->descripcion) }}</textarea>
            @if ($errors->has('descripcion'))
                <span id="descripcion-error" for="descripcion" class="error">{{ $errors->first('descripcion') }}</span>
            @endif
        </div>
        <div class="fileinput fileinput-new text-center" data-provides="fileinput">
            <h4 for="foto">Foto</h4>
            <div class="fileinput-new thumbnail">
                @if (($habitacion->foto)!="")
                    <img src="{{ $habitacion->fotourl }}" height="300px" width="300px">
                @else
                    <img src="{{asset('img/image_placeholder.jpg')}}" alt="...">
                @endif
            </div>
            <div class="fileinput-preview fileinput-exists thumbnail"></div>
            <div>
                <span class="btn btn-rose btn-round btn-file">
                    <span class="fileinput-new">Seleccione una imagen</span>
                    <span class="fileinput-exists">Change</span>
                    <input type="file" name="foto" value="{{ old('foto',$habitacion->foto) }}">
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
            <a href="{{ route('habitaciones_index') }}" class="btn btn-danger">
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