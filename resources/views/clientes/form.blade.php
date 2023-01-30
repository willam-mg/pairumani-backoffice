@csrf
<div class="card">
    <div class="card-header card-header-rose card-header-icon">
        <div class="card-icon">
            <i class="material-icons">assignment</i>
        </div>
    </div>
    <div class="card-body ">
        <div class="form-group bmd-form-group {{ $errors->has('nombres') ? 'has-danger' : '' }}">
            <label for="nombres" class="bmd-label-floating">Nombres</label>
            <input type="text" name="nombres" value="{{ old('nombres', $cliente->nombres) }}" class="form-control" autofocus>
            @if ($errors->has('nombres'))
                <span id="nombres-error" for="nombres" class="error">{{ $errors->first('nombres') }}</span>
            @endif
        </div>
        <div class="form-group bmd-form-group {{ $errors->has('apellidos') ? 'has-danger' : '' }}">
            <label for="apellidos" class="bmd-label-floating">Apellidos</label>
            <input type="text" name="apellidos" value="{{ old('apellidos', $cliente->apellidos) }}" class="form-control">
            @if ($errors->has('apellidos'))
                <span id="apellidos-error" for="apellidos" class="error">{{ $errors->first('apellidos') }}</span>
            @endif
        </div>
        <div class="form-group bmd-form-group {{ $errors->has('tipo_documento') ? 'has-danger' : '' }}">
            <label for="tipo_documento">Tipo Documento</label>
            <select name="tipo_documento" class="form-control select2bs4">
                <option>Seleccione un documento</option>
                <option value="Ci" {{ old('tipo_documento', $cliente->tipo_documento) == 'Ci' ? 'selected' : '' }}>Ci</option>
                <option value="Pasaporte" {{ old('tipo_documento', $cliente->tipo_documento) == 'Pasaporte' ? 'selected' : '' }}>Pasaporte</option>
            </select>
            @if ($errors->has('tipo_documento'))
                <span id="tipo_documento-error" for="tipo_documento" class="error">{{ $errors->first('tipo_documento') }}</span>
            @endif
        </div>
        <div class="form-group bmd-form-group {{ $errors->has('num_documento') ? 'has-danger' : '' }}">
            <label for="num_documento" class="bmd-label-floating">Num Documento</label>
            <input type="text" name="num_documento" value="{{ old('num_documento', $cliente->num_documento) }}" class="form-control">
            @if ($errors->has('num_documento'))
                <span id="num_documento-error" for="num_documento" class="error">{{ $errors->first('num_documento') }}</span>
            @endif
        </div>
        <div class="form-group bmd-form-group {{ $errors->has('celular') ? 'has-danger' : '' }}">
            <label for="celular" class="bmd-label-floating">Celular</label>
            <input type="celular" name="celular" value="{{ old('celular', $cliente->celular) }}" class="form-control">
            @if ($errors->has('celular'))
                <span id="celular-error" for="celular" class="error">{{ $errors->first('celular') }}</span>
            @endif
        </div>
        <div class="form-group bmd-form-group {{ $errors->has('telefono') ? 'has-danger' : '' }}">
            <label for="telefono" class="bmd-label-floating">Telefono</label>
            <input type="telefono" name="telefono" value="{{ old('telefono', $cliente->telefono) }}" class="form-control">
            @if ($errors->has('telefono'))
                <span id="telefono-error" for="telefono" class="error">{{ $errors->first('telefono') }}</span>
            @endif
        </div>
        <div class="form-group bmd-form-group {{ $errors->has('direccion') ? 'has-danger' : '' }}">
            <label for="direccion" class="bmd-label-floating">Direccion</label>
            <input type="direccion" name="direccion" value="{{ old('direccion', $cliente->direccion) }}" class="form-control">
            @if ($errors->has('direccion'))
                <span id="direccion-error" for="direccion" class="error">{{ $errors->first('direccion') }}</span>
            @endif
        </div>
        <div class="form-group bmd-form-group {{ $errors->has('ciudad') ? 'has-danger' : '' }}">
            <label for="ciudad" class="bmd-label-floating">Ciudad</label>
            <input type="ciudad" name="ciudad" value="{{ old('ciudad', $cliente->ciudad) }}" class="form-control">
            @if ($errors->has('ciudad'))
                <span id="ciudad-error" for="ciudad" class="error">{{ $errors->first('ciudad') }}</span>
            @endif
        </div>
        <div class="form-group bmd-form-group {{ $errors->has('pais') ? 'has-danger' : '' }}">
            <label for="pais" class="bmd-label-floating">Pais</label>
            <input type="pais" name="pais" value="{{ old('pais', $cliente->pais) }}" class="form-control">
            @if ($errors->has('pais'))
                <span id="pais-error" for="pais" class="error">{{ $errors->first('pais') }}</span>
            @endif
        </div>
        <div class="form-group bmd-form-group {{ $errors->has('oficio') ? 'has-danger' : '' }}">
            <label for="oficio" class="bmd-label-floating">Oficio</label>
            <input type="oficio" name="oficio" value="{{ old('oficio', $cliente->oficio) }}" class="form-control">
            @if ($errors->has('oficio'))
                <span id="oficio-error" for="oficio" class="error">{{ $errors->first('oficio') }}</span>
            @endif
        </div>
        <div class="form-group bmd-form-group {{ $errors->has('empresa') ? 'has-danger' : '' }}">
            <label for="empresa" class="bmd-label-floating">Empresa</label>
            <input type="empresa" name="empresa" value="{{ old('empresa', $cliente->empresa) }}" class="form-control">
            @if ($errors->has('empresa'))
                <span id="empresa-error" for="empresa" class="error">{{ $errors->first('empresa') }}</span>
            @endif
        </div>
        <div class="form-group bmd-form-group {{ $errors->has('email') ? 'has-danger' : '' }}">
            <label for="email" class="bmd-label-floating">Email</label>
            <input type="email" name="email" value="{{ old('email', $cliente->email) }}" class="form-control">
            @if ($errors->has('email'))
                <span id="email-error" for="email" class="error">{{ $errors->first('email') }}</span>
            @endif
        </div>
        {{-- <div class="form-group bmd-form-group {{ $errors->has('password') ? 'has-danger' : '' }}">
            <label for="password" class="bmd-label-floating">Password</label>
            <input type="password" name="password" value="{{ old('password') }}" class="form-control">
            @if ($errors->has('password'))
                <span id="password-error" for="password" class="error">{{ $errors->first('password') }}</span>
            @endif
        </div> --}}
        <div class="form-group bmd-form-group {{ $errors->has('fecha_nacimiento') ? 'has-danger' : '' }}">
            <label for="fecha"><strong>Fecha Nacimiento</strong></label><br>
            <input type="date" name="fecha_nacimiento" value="{{ old('fecha_nacimiento',$cliente->fecha_nacimiento) }}" class="form-control">
            @if ($errors->has('fecha_nacimiento'))
                <span id="fecha_nacimiento-error" for="fecha_nacimiento" class="error">{{ $errors->first('fecha_nacimiento') }}</span>
            @endif
        </div>
        <div class="form-group bmd-form-group {{ $errors->has('motivo_viaje') ? 'has-danger' : '' }}">
            <label for="motivo_viaje">Motivo Viaje</label>
            <select name="motivo_viaje" class="form-control select2bs4">
                <option>Seleccione una opcion</option>
                <option value="Recreacion" {{ old('motivo_viaje', $cliente->motivo_viaje) == 'Recreacion' ? 'selected' : '' }}>Recreacion</option>
                <option value="Negocios" {{ old('motivo_viaje', $cliente->motivo_viaje) == 'Negocios' ? 'selected' : '' }}>Negocios</option>
                <option value="Salud" {{ old('motivo_viaje', $cliente->motivo_viaje) == 'Salud' ? 'selected' : '' }}>Salud</option>
                <option value="Otro" {{ old('motivo_viaje', $cliente->motivo_viaje) == 'Otro' ? 'selected' : '' }}>Otro</option>
            </select>
            @if ($errors->has('motivo_viaje'))
                <span id="motivo_viaje-error" for="motivo_viaje" class="error">{{ $errors->first('motivo_viaje') }}</span>
            @endif
        </div>
    </div>
    <div class="card-footer text-right">
        <div class="form-group">
            <button class="btn btn-primary" type="submit">
                <i class="material-icons">save</i> Guardar
            </button>
            @if($tipo == 'reserva')
                <a href="{{ route('reservas_create',[$habitacion,$reserva]) }}" class="btn btn-danger">
                    <i class="material-icons">clear</i> Cancelar
                </a>
            @elseif($tipo == 'hospedaje')
                <a href="{{ route('hospedajes_create') }}" class="btn btn-danger">
                    <i class="material-icons">clear</i> Cancelar
                </a>
            @elseif($tipo == 'promocion')
                <a href="{{ route('promocionreservas_create',$promocion) }}" class="btn btn-danger">
                    <i class="material-icons">clear</i> Cancelar
                </a>
            @else
                <a href="{{ route('clientes_index') }}" class="btn btn-danger">
                    <i class="material-icons">clear</i> Cancelar
                </a>
            @endif
        </div>
    </div>
</div>