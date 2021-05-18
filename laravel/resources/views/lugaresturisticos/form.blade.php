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
                <input type="text" name="nombre" value="{{ old('nombre', $lugar->nombre) }}" class="form-control" autofocus>
                @if ($errors->has('nombre'))
                    <span id="nombre-error" for="nombre" class="error">{{ $errors->first('nombre') }}</span>
                @endif
            </div>
        </div>
        <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
            <div class="form-group bmd-form-group {{ $errors->has('precio_recorrido') ? 'has-danger' : '' }}">
                <label for="precio_recorrido" class="bmd-label-floating">precio_recorrido</label>
                <input type="number" min="1" name="precio_recorrido" value="{{ old('precio_recorrido', $lugar->precio_recorrido) }}" class="form-control" autofocus>
                @if ($errors->has('precio_recorrido'))
                    <span id="precio_recorrido-error" for="precio_recorrido" class="error">{{ $errors->first('precio_recorrido') }}</span>
                @endif
            </div>
        </div>
        <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
            <div class="form-group bmd-form-group {{ $errors->has('tipo') ? 'has-danger' : '' }}">
                <label for="tipo">Tipo</label>
                <select name="tipo" class="form-control select2bs4">
                    <option>Seleccione una opcion</option>
                    <option value="Turismo" {{ old('tipo', $lugar->tipo) == 'Turismo' ? 'selected' : '' }}>Turismo</option>
                    <option value="Gastronomia" {{ old('tipo', $lugar->tipo) == 'Gastronomia' ? 'selected' : '' }}>Gastronomia</option>
                </select>
                @if ($errors->has('tipo'))
                    <span id="tipo-error" for="tipo" class="error">{{ $errors->first('tipo') }}</span>
                @endif
            </div>
        </div>
        <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
            <label for="descripcion"><strong>Descripcion</strong></label>
            <div class="form-group bmd-form-group {{ $errors->has('descripcion') ? 'has-danger' : '' }}">
                <textarea name="descripcion" id="editor" class="form-control" cols="30" rows="10">{{ old('descripcion', $lugar->descripcion) }}</textarea>
                @if ($errors->has('descripcion'))
                    <span id="descripcion-error" for="descripcion" class="error">{{ $errors->first('descripcion') }}</span>
                @endif
            </div>
        </div>
        <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
            <div class="form-group">
                <input type="hidden" id="lat" name="lat" value="{{ old('lat',$lugar->lat) }}">
				<input type="hidden" id="lng" name="lng" value="{{ old('lng',$lugar->lng) }}">
				<div id="map"></div> 
            </div>
        </div>
        <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
            <h4 for="foto">Foto</h4>
            <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                <div class="fileinput-new thumbnail">
                    @if (($lugar->foto)!="")
                        <img src="{{ $lugar->fotourl }}" height="300px" width="300px">
                    @else
                        <img src="{{asset('img/image_placeholder.jpg')}}" alt="...">
                    @endif
                </div>
                <div class="fileinput-preview fileinput-exists thumbnail"></div>
                <div>
                    <span class="btn btn-rose btn-round btn-file">
                        <span class="fileinput-new">Seleccione una imagen</span>
                        <span class="fileinput-exists">Change</span>
                        <input type="file" name="foto" value="{{ old('foto',$lugar->foto) }}">
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
            <a href="{{ route('lugaresturisticos_index') }}" class="btn btn-danger">
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
		$('#map').locationpicker({
			location: {
                latitude: '{{ $lugar->lat ? $lugar->lat : '-17.392598568283628' }}',
                longitude: '{{ $lugar->lng ? $lugar->lng : '-66.15882324223594' }}'
			},
			radius: '0',
			zoom: 18,
			inputBinding: {
				latitudeInput: $('#lat'),
				longitudeInput: $('#lng'),
				// locationNameInput: $('#location'),
				// radiusInput: $('#radius'),
			},
			// Para cargar vista satelital
			// mapTypeId: google.maps.MapTypeId.SATELLITE,

			enableAutocomplete: true,
			onchanged: function (currentLocation, radius, isMarkerDropped) {
				// Uncomment line below to show alert on each Location Changed event
				//alert("Location changed. New location (" + currentLocation.latitude + ", " + currentLocation.longitude + ")");
			}
		});
    </script>
@endpush