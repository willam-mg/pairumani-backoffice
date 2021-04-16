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
                <input type="text" name="nombre" value="{{ old('nombre', $usuario->nombre) }}" class="form-control">
                @if ($errors->has('nombre'))
                    <span id="nombre-error" for="nombre" class="error">{{ $errors->first('nombre') }}</span>
                @endif
            </div>
        </div>
        <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
            <div class="form-group bmd-form-group {{ $errors->has('apellido') ? 'has-danger' : '' }}">
                <label for="apellido" class="bmd-label-floating">Apellido</label>
                <input type="text" name="apellido" value="{{ old('apellido', $usuario->apellido) }}" class="form-control">
                @if ($errors->has('apellido'))
                    <span id="apellido-error" for="apellido" class="error">{{ $errors->first('apellido') }}</span>
                @endif
            </div>
        </div>
        <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
            <div class="form-group bmd-form-group {{ $errors->has('email') ? 'has-danger' : '' }}">
                <label for="email" class="bmd-label-floating">Email</label>
                <input type="email" name="email" value="{{ old('email', $usuario->email) }}" class="form-control">
                @if ($errors->has('email'))
                    <span id="email-error" for="email" class="error">{{ $errors->first('email') }}</span>
                @endif
            </div>
        </div>
        <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
            <div class="form-group bmd-form-group {{ $errors->has('telefono') ? 'has-danger' : '' }}">
                <label for="telefono" class="bmd-label-floating">Telefono</label>
                <input type="number" min="0" name="telefono" value="{{ old('telefono', $usuario->telefono) }}" class="form-control">
                @if ($errors->has('telefono'))
                    <span id="telefono-error" for="telefono" class="error">{{ $errors->first('telefono') }}</span>
                @endif
            </div>
        </div>
        <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
            <div class="form-group bmd-form-group {{ $errors->has('direccion') ? 'has-danger' : '' }}">
                <label for="direccion" class="bmd-label-floating">Direccion</label>
                <input type="text" name="direccion" value="{{ old('direccion', $usuario->direccion) }}" class="form-control">
                @if ($errors->has('direccion'))
                    <span id="direccion-error" for="direccion" class="error">{{ $errors->first('direccion') }}</span>
                @endif
            </div>
        </div>
        <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
            <div class="form-group bmd-form-group {{ $errors->has('password') ? 'has-danger' : '' }}">
                <label for="password" class="bmd-label-floating">Password</label>
                <input type="password" name="password" value="{{ old('password') }}" class="form-control">
                @if ($errors->has('password'))
                    <span id="password-error" for="password" class="error">{{ $errors->first('password') }}</span>
                @endif
            </div>
        </div>    
        <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
            <div class="form-group bmd-form-group {{ $errors->has('rol_id') ? 'has-danger' : '' }}">
                <label for="rol_id">Roles</label>
                <select name="rol_id" class="form-control select2bs4">
                    <option>Seleccione un rol</option>
                    @foreach ($roles as $key => $value)
                        <option value="{{ $key }}" {{ old('rol_id', $usuario->rol_id) == $key ? 'selected' : '' }}>{{ $value }}</option>
                    @endforeach
                </select>
                @if ($errors->has('rol_id'))
                    <span id="rol_id-error" for="rol_id" class="error">{{ $errors->first('rol_id') }}</span>
                @endif
            </div>
        </div>
    </div>
    <div class="card-footer text-right">
        <div class="form-group">
            <button class="btn btn-primary" type="submit">
                <i class="material-icons">save</i> Guardar
            </button>
            <a href="{{ route('usuarios_index') }}" class="btn btn-danger">
                <i class="material-icons">clear</i> Cancelar
            </a>
        </div>
    </div>
</div>