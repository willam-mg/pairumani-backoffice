@csrf
<div class="card">
    <div class="card-header card-header-rose card-header-icon">
        <div class="card-icon">
            <i class="material-icons">assignment</i>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                    <div class="form-group bmd-form-group {{ $errors->has('cliente_id') ? 'has-danger' : '' }}">
                        <label for="cliente_id">Clientes</label>
                        <select name="cliente_id" class="form-control select2bs4">
                            <option>Seleccione un cliente</option>
                            @foreach ($clientes as $key => $value)
                                <option value="{{  $key }}" {{ old('cliente_id', $reserva->cliente_id) == $key ? 'selected' : '' }}>{{ $value }}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('cliente_id'))
                            <span id="cliente_id-error" for="cliente_id" class="error">{{ $errors->first('cliente_id') }}</span>
                        @endif
                    </div>                
                </div>
            </div>
            {{-- @if(routerequest('reservas_create')) --}}
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12" style="margin-top: 20px;">
                    <div class="form-group">
                        @if($habitacion) 
                            <a class="btn btn-success" href="{{ route('clientes_create',[$tipo,$habitacion->id]) }}">Nuevo cliente</a>
                        @else
                            <a class="btn btn-success" href="{{ route('clientes_create',[$tipo]) }}">Nuevo cliente</a>
                        @endif
                    </div>
                </div>                
            {{-- @endif --}}
        </div>
        <div class="form-group bmd-form-group {{ $errors->has('checkin') ? 'has-danger' : '' }}">
            <label for="checkin"><strong>Checkin</strong></label><br>
            <input type="datetime-local" name="checkin" value="{{ old('checkin', datetime($reserva->checkin)) }}" class="form-control">
            @if ($errors->has('checkin'))
                <span id="checkin-error" for="checkin" class="error">{{ $errors->first('checkin') }}</span>
            @endif
        </div>
        <div class="form-group bmd-form-group {{ $errors->has('checkout') ? 'has-danger' : '' }}">
            <label for="checkout"><strong>Checkout</strong></label><br>
            <input type="datetime-local" name="checkout" value="{{ old('checkout', datetime($reserva->checkout)) }}" class="form-control">
            @if ($errors->has('checkout'))
                <span id="checkout-error" for="checkout" class="error">{{ $errors->first('checkout') }}</span>
            @endif
        </div>
        <div class="form-group bmd-form-group {{ $errors->has('adultos') ? 'has-danger' : '' }}">
            <label for="adultos" class="bmd-label-floating">Num Adultos</label>
            <input type="number" name="adultos" min="1" value="{{ old('adultos', $reserva->adultos) }}" class="form-control">
            @if ($errors->has('adultos'))
                <span id="adultos-error" for="adultos" class="error">{{ $errors->first('adultos') }}</span>
            @endif
        </div>
        <div class="form-group bmd-form-group {{ $errors->has('niños') ? 'has-danger' : '' }}">
            <label for="niños" class="bmd-label-floating">Num Niños</label>
            <input type="number" name="niños" min="1" value="{{ old('niños', $reserva->niños) }}" class="form-control">
            @if ($errors->has('niños'))
                <span id="niños-error" for="niños" class="error">{{ $errors->first('niños') }}</span>
            @endif
        </div>
    </div>
    <div class="card-footer text-right">
        <div class="form-group">
            <button class="btn btn-primary" type="submit">
                <i class="material-icons">save</i> Guardar
            </button>
            @if($habitacion)
                <a href="{{ route('reservas_index',[$habitacion->id]) }}" class="btn btn-danger">
                    <i class="material-icons">clear</i> Cancelar
                </a>
            @else
                <a href="{{ route('reservas') }}" class="btn btn-danger">
                    <i class="material-icons">clear</i> Cancelar
                </a>
            
            @endif
            
        </div>
    </div>
</div>