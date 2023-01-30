@csrf
<div class="card">
    <div class="card-header card-header-rose card-header-icon">
        <div class="card-icon">
            <i class="material-icons">assignment</i>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-lg-8 col-sm-8 col-md-8 col-xs-8">
                <div class="form-group bmd-form-group {{ $errors->has('cliente_id') ? 'has-danger' : '' }}">
                    <label>Cliente</label>
                    <select name="cliente_id" class="form-control select2bs4" id="cliente_id">
                        <option>Seleccione un Cliente</option>
                        @foreach($clientes as $key => $value)
                            <option value="{{ $key }}" {{ old('cliente_id', $hospedaje->cliente_id) == $key ? 'selected' : '' }}>{{ $value }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('cliente_id'))
                        <span id="cliente_id-error" for="cliente_id" class="error">{{ $errors->first('cliente_id') }}</span>
                    @endif
                </div>
            </div>
            @if (routerequest('hospedajes_create'))
                <div class="col-lg-4 col-sm-4 col-md-4 col-xs-4" style="margin-top: 20px;">
                    <div class="form-group">
                        <a class="btn btn-success" href="{{ route('clientes_create',$tipo) }}">Nuevo cliente</a>
                    </div>
                </div>                    
            @endif
        </div>
        <div class="form-group bmd-form-group {{ $errors->has('habitacion_id') ? 'has-danger' : '' }}">
            <label>Habitacion</label>
            <select name="habitacion_id" class="form-control select2bs4" id="habitacion_id">
                @if(routerequest('hospedajes_edit') == 'true')
                    {{-- <option value>Seleccione una Habitacion</option> --}}
                    <option selected value="{{ $hospedaje->habitacion_id }}">{{ $hospedaje->habitacion->nombre }}</option>
                @else
                    <option>Seleccione una Habitacion</option>
                    @foreach($habitaciones as $key => $value)
                        <option value="{{ $key }}" {{ old('habitacion_id', $hospedaje->habitacion_id) == $key ? 'selected' : '' }}>{{ $value }}</option>
                    @endforeach
                @endif
            </select>
            @if ($errors->has('habitacion_id'))
                <span id="habitacion_id-error" for="habitacion_id" class="error">{{ $errors->first('habitacion_id') }}</span>
            @endif
        </div>
        <div class="form-group bmd-form-group {{ $errors->has('fecha_checkin') ? 'has-danger' : '' }}">
            <label for="fecha"><strong>Fecha Checkin</strong></label><br>
            <input type="datetime-local" name="fecha_checkin" value="{{ old('fecha_checkin',  datetime($hospedaje->fecha_checkin)) }}" class="form-control">
            @if ($errors->has('fecha_checkin'))
                <span id="fecha_checkin-error" for="fecha_checkin" class="error">{{ $errors->first('fecha_checkin') }}</span>
            @endif
        </div>
        <div class="form-group bmd-form-group {{ $errors->has('fecha_checkout') ? 'has-danger' : '' }}">
             <label for="fecha"><strong>Fecha Checkout</strong></label><br>
            <input type="datetime-local" name="fecha_checkout" value="{{ old('fecha_checkout', datetime($hospedaje->fecha_checkout)) }}" class="form-control">
            @if ($errors->has('fecha_checkout'))
                <span id="fecha_checkout-error" for="fecha_checkout" class="error">{{ $errors->first('fecha_checkout') }}</span>
            @endif
        </div>
        <div class="form-group bmd-form-group {{ $errors->has('niños') ? 'has-danger' : '' }}">
            <label for="niños" class="bmd-label-floating">Niños</label>
            <input type="number" min="1" name="niños" value="{{ old('niños', $hospedaje->niños) }}" class="form-control">
            @if ($errors->has('niños'))
                <span id="niños-error" for="niños" class="error">{{ $errors->first('niños') }}</span>
            @endif
        </div>
        <div class="form-group bmd-form-group {{ $errors->has('adultos') ? 'has-danger' : '' }}">
            <label for="adultos" class="bmd-label-floating">Adultos</label>
            <input type="number" min="1" name="adultos" value="{{ old('adultos', $hospedaje->adultos) }}" class="form-control">
            @if ($errors->has('adultos'))
                <span id="adultos-error" for="adultos" class="error">{{ $errors->first('adultos') }}</span>
            @endif
        </div>
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
@push('scripts')
    <script>
        $(document).ready(function(){
            $('#habitacion_id').change(function(){
                $('#promocion').empty();
                promocion();
            });
        });
        function promocion()
        {
            var id = $('#habitacion_id').val();
            var url = '{{ route("hospedajes_promocion", ":id") }}';
            url = url.replace(':id', id );
            $.ajax({
                url: url,
                type:'POST',
                data:{
                    '_token': $('meta[name=csrf-token]').attr("content"),
                    'id':id
                },
            }).done(function(data){
                var todo = '<tr><td>'+data.nombre+'</td>';
                todo+='<td>'+data.precio+'</td>';
                todo+='<td>'+data.habitacion.num_habitacion+'</td></tr>';
                $('#promocion').append(todo);
            });
        }
    </script>
    <script>
        $(document).ready(function(){
            $('#cliente_id').change(function(){
                $('#acompañantes').empty();
                $('#nuevo').empty();
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
                // var tipo = '{{$tipo}}';
                var route = '{{ route("acompanantes_create", [":id","hospedaje","0","0","0","0","0"]) }}';
                route = route.replace(':id', id );
                for(var i = 0; i < arreglo.length; i++){
                    var todo = '<tr><td>'+arreglo[i].nombre+'</td>';
                    todo+='<td>'+arreglo[i].nacionalidad+'</td></tr>';
                    $('#acompañantes').append(todo);
                }
                $('#nuevo').append('<a href="'+route+'" class="btn btn-success">Nuevo Acompañante</a>');                
            });
        }
    </script>
@endpush