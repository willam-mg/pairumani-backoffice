@extends ('layouts.admin')
@section('header')
    <!-- Content Header (Page header) -->
    <h3 class="m-0 text-dark">Galeria Lugar Turistico: {{ $lugar->nombre }}</h3>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-6">
                    <ol class="breadcrumb" style="background-color: inherit">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
						<li class="breadcrumb-item"><a href="{{ route('lugaresturisticos_index') }}">Lugares Turisticos</a></li>
						<li class="breadcrumb-item"><a href="{{ route('lugaresturisticos_show',$lugar->id) }}">Lugar Turistico {{ $lugar->nombre }}</a></li>
                        <li class="breadcrumb-item active">Galeria Lugar Turistico</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div>
    </div>
    <!-- /.content-header -->
@endsection
@section ('contenido')
	<div class="content">
		<div class="container-fluid">
			<div class="row">
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                    <div class="card">
                        <div class="card-body">
                            <form method="POST" action="{{ route('lugaresturisticos_galeria',$lugar->id) }}" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                                        <h4 for="foto">foto</h4>
                                        <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                            <div class="fileinput-new thumbnail">
                                                <img src="{{asset('img/image_placeholder.jpg')}}" alt="...">
                                            </div>
                                            <div class="fileinput-preview fileinput-exists thumbnail"></div>
                                            <div>
                                                <span class="btn btn-rose btn-round btn-file">
                                                    <span class="fileinput-new">Seleccione una imagen</span>
                                                    <span class="fileinput-exists">Change</span>
                                                    <input type="file" name="foto" value="{{ old('foto') }}">
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
                                        <label for="descripcion"><strong>Descripcion</strong></label>
                                        <div class="form-group bmd-form-group {{ $errors->has('descripcion') ? 'has-danger' : '' }}">
                                            <textarea name="descripcion" id="editor" class="form-control" cols="30" rows="10">{{ old('descripcion') }}</textarea>
                                            @if ($errors->has('descripcion'))
                                                <span id="descripcion-error" for="descripcion" class="error">{{ $errors->first('descripcion') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group d-flex">
                                    <button class="btn btn-primary" type="submit">
                                        <i class="material-icons">save</i> Guardar
                                    </button>
                                    <a href="{{ route('lugaresturisticos_index') }}" class="btn btn-danger">
                                        <i class="material-icons">clear</i> Cancelar
                                    </a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                    <div class="row">
                        @foreach ($lugar->fotos as $foto)
                            <form method="POST" action="{{ route('lugaresturisticos_galeria_destroy',[$lugar->id,$foto->id]) }}">
                                @method('DELETE') @csrf
                                <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
                                    @if(kvfj(Auth::user()->rol->permisos,'lugaresturisticos_galeria_destroy'))
                                        <button class="btn btn-danger btn-xs" style="position: absolute" type="submit" title="Eliminar foto">
                                            <i class="material-icons">clear</i>
                                        </button>
                                    @endif
                                    <img src="{{ $foto->fotourl }}" alt="{{ $lugar->nombre }}" width="150px" height="150px">
                                </div>
                            </form>
                        @endforeach
                    </div>
                </div>
			</div>
    	</div>
	</div>
@endsection
@push('scripts')
    <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
    <script>
        $(function(){
            CKEDITOR.replace('editor');
        });
    </script>
@endpush