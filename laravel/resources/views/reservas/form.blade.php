@csrf
<div class="card">
    <div class="card-header card-header-rose card-header-icon">
        <div class="card-icon">
            <i class="material-icons">assignment</i>
        </div>
    </div>
    <div class="card-body ">
        <div class="row">
            <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                @if($habitacion->promocion->estado == 'Activo')
                    <h3>Promoción</h3>
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th>Promocion</th>
                                <th>Precio</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $habitacion->promocion->nombre }}</td>
                                <td>Bs. {{ $habitacion->promocion->precio }}</td>
                            </tr>
                        </tbody>
                    </table>
                @endif
            </div>
        </div>            
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
            @if(routerequest('reservas_create'))
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12" style="margin-top: 20px;">
                    <div class="form-group">
                        <a class="btn btn-success" href="{{ route('clientes_create',[$tipo,$categoria->id,$habitacion->id]) }}">Nuevo cliente</a>
                    </div>
                </div>                
            @endif
        </div>
        <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
            <div class="form-group bmd-form-group {{ $errors->has('checkin') ? 'has-danger' : '' }}">
                <label for="checkin" class="bmd-label-floating">Checkin</label>
                <input type="date" name="checkin" value="{{ old('checkin', $reserva->checkin) }}" class="form-control">
                @if ($errors->has('checkin'))
                    <span id="checkin-error" for="checking" class="error">{{ $errors->first('checking') }}</span>
                @endif
            </div>
        </div>
        <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
            <div class="form-group bmd-form-group {{ $errors->has('checkout') ? 'has-danger' : '' }}">
                <label for="checkout" class="bmd-label-floating">Checkout</label>
                <input type="date" name="checkout" value="{{ old('checkout', $reserva->checkout) }}" class="form-control">
                @if ($errors->has('checkout'))
                    <span id="checkout-error" for="checkout" class="error">{{ $errors->first('checkout') }}</span>
                @endif
            </div>
        </div>
        <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
            <div class="form-group bmd-form-group {{ $errors->has('adultos') ? 'has-danger' : '' }}">
                <label for="adultos" class="bmd-label-floating">Num Adultos</label>
                <input type="number" name="adultos" min="1" value="{{ old('adultos', $reserva->adultos) }}" class="form-control">
                @if ($errors->has('adultos'))
                    <span id="adultos-error" for="adultos" class="error">{{ $errors->first('adultos') }}</span>
                @endif
            </div>
        </div>
        <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
            <div class="form-group bmd-form-group {{ $errors->has('niños') ? 'has-danger' : '' }}">
                <label for="niños" class="bmd-label-floating">Num Niños</label>
                <input type="number" name="niños" min="1" value="{{ old('niños', $reserva->niños) }}" class="form-control">
                @if ($errors->has('niños'))
                    <span id="niños-error" for="niños" class="error">{{ $errors->first('niños') }}</span>
                @endif
            </div>
        </div>
    </div>
    <div class="card-footer text-right">
        <div class="form-group">
            <button class="btn btn-primary" type="submit">
                <i class="material-icons">save</i> Guardar
            </button>
            <a href="{{ route('reservas_index',[$categoria->id,$habitacion->id]) }}" class="btn btn-danger">
                <i class="material-icons">clear</i> Cancelar
            </a>
        </div>
    </div>
</div>