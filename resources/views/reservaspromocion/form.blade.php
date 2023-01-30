@csrf
<div class="card">
    <div class="card-header card-header-rose card-header-icon">
        <div class="card-icon">
            <i class="material-icons">assignment</i>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-lg-8 col-sm-8 col-md-8 col-xs-12">
                <div class="form-group">
                    <div class="form-group bmd-form-group {{ $errors->has('cliente_id') ? 'has-danger' : '' }}">
                        <label for="cliente_id">Clientes</label>
                        <select name="cliente_id" id="cliente_id" class="form-control select2bs4">
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
            @if(routerequest('promocionreservas_create'))
                <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12" style="margin-top: 20px;">
                    <div class="form-group">
                        <a class="btn btn-success" href="{{ route('clientes_create',[$tipo,0,0,0,$promocion->id]) }}">Nuevo cliente</a>
                    </div>
                </div>                
            @endif
        </div>
        <div class="form-group bmd-form-group {{ $errors->has('checkin') ? 'has-danger' : '' }}">
            <label for="checkout"><strong>Checkin</strong></label><br>
            <input type="datetime-local" name="checkin" value="{{ old('checkin', datetime($reserva->checkin)) }}" class="form-control">
            @if ($errors->has('checkin'))
                <span id="checkin-error" for="checking" class="error">{{ $errors->first('checking') }}</span>
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
            <a href="{{ route('promocionreservas_index',$promocion->id) }}" class="btn btn-danger">
                <i class="material-icons">clear</i> Cancelar
            </a>
        </div>
    </div>
</div>
@push('scripts')
    <script>
        $(document).ready(function(){
            $('#cliente_id').change(function(){
                $('#acompañantes').empty();
                $('#creara').empty();
                acompañante();
            });
        });
        function acompañante()
        {
            var id = $('#cliente_id').val();
            var url = '{{ route("promocionreservas_acompanante", ":id") }}';
            url = url.replace(':id', id );
            $.ajax({
                url: url,
                type:'POST',
                data:{
                    '_token': $('meta[name=csrf-token]').attr("content"),
                    'id':id
                },
            }).done(function(data){
                var arreglo = JSON.parse(data);
                for(var i = 0; i < arreglo.length; i++){
                    var todo = '<tr><td>'+arreglo[i].nombre+'</td>';
                    todo+='<td>'+arreglo[i].nacionalidad+'</td></tr>';
                    $('#acompañantes').append(todo);
                }
            });
        }
        function createacompanante(tipo,promocion)
        {
            console.log(tipo);
            console.log(promocion);
        }
    </script>
@endpush