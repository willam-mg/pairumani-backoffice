@extends('layouts.admin')
@section('header')
    <!-- Content Header (Page header) -->
    <h3 class="m-0 text-dark">Hospedaje Reserva Lugar Turistico</h3>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-12">
                    <ol class="breadcrumb" style="background-color: inherit">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('hospedajes_index') }}">Hospedajes</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('hospedajes_show',$hospedaje->id) }}">Hospedaje {{ $hospedaje->id }}</a></li>
                        <li class="breadcrumb-item active">Hospedaje Reserva Lugar Turistico</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div>
    </div>
    <!-- /.content-header -->
@endsection
@section('contenido')
    <div class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-xs-12 col-sm-8 col-md-8 col-lg-8 col-centered ml-auto mr-auto">
					<form method="POST" action="{{ route('hospedajes_reserva_lugar',$hospedaje->id) }}">
                        @csrf
						<div class="card">
                            <div class="card-header card-header-rose card-header-icon">
                                <div class="card-icon">
                                    <i class="material-icons">assignment</i>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form-group bmd-form-group {{ $errors->has('lugar_turistico_id') ? 'has-danger' : '' }}">
                                    <label>Lugar Turistico</label>
                                    <select name="lugar_turistico_id" class="form-control select2bs4" id="lugar_turistico_id">
                                        <option value>Seleccione una Lugar Turistico</option>
                                        @foreach($lugares as $lugar)
                                            <option value="{{ $lugar->id }}_{{ $lugar->precio_recorrido }}_{{ $lugar->tipo }}" {{ old('lugar_turistico_id')}}>{{ $lugar->nombre }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('lugar_turistico_id'))
                                        <span id="lugar_turistico_id-error" for="lugar_turistico_id" class="error">{{ $errors->first('lugar_turistico_id') }}</span>
                                    @endif
                                </div>
                                <div class="form-group bmd-form-group {{ $errors->has('precio') ? 'has-danger' : '' }}">
                                    <label>Precio</label>
                                    <input disabled type="number" id="precio" name="precio" value="{{ old('precio') }}" class="form-control">
                                    @if ($errors->has('precio'))
                                        <span id="precio-error" for="precio" class="error">{{ $errors->first('precio') }}</span>
                                    @endif
                                </div>
                                <div class="form-group bmd-form-group {{ $errors->has('tipo') ? 'has-danger' : '' }}">
                                    <label>Tipo</label>
                                    <input disabled type="text" id="tipo" value="{{ old('tipo') }}" class="form-control">
                                    @if ($errors->has('tipo'))
                                        <span id="tipo-error" for="tipo" class="error">{{ $errors->first('tipo') }}</span>
                                    @endif
                                </div>
                                <div class="form-group bmd-form-group {{ $errors->has('fecha') ? 'has-danger' : '' }}">
                                    <label for="fecha"><strong>Fecha</strong></label><br>
                                    <input type="date" name="fecha" value="{{ old('fecha') }}" class="form-control">
                                    @if ($errors->has('fecha'))
                                        <span id="fecha-error" for="fecha" class="error">{{ $errors->first('fecha') }}</span>
                                    @endif
                                </div>
                                <div class="card-footer text-right">
                                    <div class="form-group">
                                        <button class="btn btn-primary" type="submit">
                                            <i class="material-icons">save</i> Guardar
                                        </button>
                                        <a href="{{ route('hospedajes_index') }}" class="btn btn-danger">
                                            <i class="material-icons">clear</i> Cancelar
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
					</form>
				</div>
			</div>
    	</div>
	</div>
@endsection
@push('scripts')
    <script>
        $("#lugar_turistico_id").change(mostrarValores);
        function mostrarValores()
        {
            datoslugar=document.getElementById('lugar_turistico_id').value.split('_');
            $("#precio").val(datoslugar[1]);
            $("#tipo").val(datoslugar[2]);
        }
    </script>
@endpush