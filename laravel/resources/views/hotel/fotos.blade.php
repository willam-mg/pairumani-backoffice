@extends ('layouts.admin')
@section('header')
    <!-- Content Header (Page header) -->
    <h3 class="m-0 text-dark">Hotel Galeria</h3>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-12">
                    <ol class="breadcrumb" style="background-color: inherit">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
						<li class="breadcrumb-item active">Hotel Galeria</li>
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
                <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
                    <div class="card">
                        <div class="card-body">
                            <form method="POST" action="{{ route('hotel_galeria') }}" enctype="multipart/form-data">
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
                                </div>
                                <div class="form-group d-flex">
                                    <button class="btn btn-primary" type="submit">
                                        <i class="material-icons">save</i> Guardar
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 col-sm-9 col-md-9 col-xs-12">
                    <div class="row">
                        @foreach ($fotos as $foto)
                            <form method="POST" action="{{ route('hotel_galeria_destroy',$foto->id) }}">
                                @method('DELETE') @csrf
                                <div class="col-md-3">
                                    @if(kvfj(Auth::user()->rol->permisos,'hotel_galeria_destroy'))
                                        <button class="btn btn-danger btn-xs" style="position: absolute" type="submit" title="Eliminar foto">
                                            <i class="material-icons">clear</i>
                                        </button>
                                    @endif
                                    <img src="{{ $foto->fotourl }}" alt="foto" width="150px" height="150px">
                                </div>
                            </form>
                        @endforeach
                    </div>
                </div>
			</div>
    	</div>
	</div>
@endsection