@csrf
<div class="card">
    <div class="card-header card-header-rose card-header-icon">
        <div class="card-icon">
            <i class="material-icons">assignment</i>
        </div>
    </div>
    <div class="card-body">
        <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
            <div class="row">
                <div class="col-lg-8 col-sm-8 col-md-8 col-xs-12">
                    <div class="form-group bmd-form-group {{ $errors->has('cliente_id') ? 'has-danger' : '' }}">
                        <label>Cliente</label>
                        <select name="cliente_id" class="form-control select2bs4" id="cliente_id">
                            <option value>Seleccione un Cliente</option>
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
                    <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12" style="margin-top: 20px;">
                        <div class="form-group">
                            <a class="btn btn-success" href="{{ route('clientes_create',$tipo) }}">Nuevo cliente</a>
                        </div>
                    </div>                    
                @endif
            </div>
        </div>
        <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
            <div class="form-group bmd-form-group {{ $errors->has('habitacion_id') ? 'has-danger' : '' }}">
                <label>Habitacion</label>
                <select name="habitacion_id" class="form-control select2bs4" id="habitacion_id">
                    <option value>Seleccione una Habitacion</option>
                    @foreach($habitaciones as $key => $value)
                        <option value="{{ $key }}" {{ old('habitacion_id', $hospedaje->habitacion_id) == $key ? 'selected' : '' }}>{{ $value }}</option>
                    @endforeach
                </select>
                @if ($errors->has('habitacion_id'))
                    <span id="habitacion_id-error" for="habitacion_id" class="error">{{ $errors->first('habitacion_id') }}</span>
                @endif
            </div>
        </div>
        <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
            <div class="form-group bmd-form-group {{ $errors->has('fecha_checkin') ? 'has-danger' : '' }}">
                <label for="fecha_checkin" class="bmd-label-floating">Fecha Checkin</label>
                <input type="date" name="fecha_checkin" value="{{ old('fecha_checkin', $hospedaje->fecha_checkin) }}" class="form-control">
                @if ($errors->has('fecha_checkin'))
                    <span id="fecha_checkin-error" for="fecha_checking" class="error">{{ $errors->first('fecha_checking') }}</span>
                @endif
            </div>
        </div>
        <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
            <div class="form-group bmd-form-group {{ $errors->has('fecha_checkout') ? 'has-danger' : '' }}">
                <label for="fecha_checkout" class="bmd-label-floating">Fecha Checkout</label>
                <input type="date" name="fecha_checkout" value="{{ old('fecha_checkout', $hospedaje->fecha_checkout) }}" class="form-control">
                @if ($errors->has('fecha_checkout'))
                    <span id="fecha_checkout-error" for="fecha_checkout" class="error">{{ $errors->first('fecha_checkout') }}</span>
                @endif
            </div>
        </div>
        <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
            <h3>Acompañantes</h3>
            <div class="row">
                <div class="col-lg-5 col-sm-5 col-md-5 col-xs-12">
                    <div class="form-group">
                        <label>Acompañante</label>
                        <select name="pacompañante_id" class="form-control select2bs4" id="pacompañante_id">
                            <option value>Seleccione un Acompañante</option>
                            @foreach($acompañantes as $key=>$value)
                                <option value="{{ $key }}" {{ old('acompanante_id', $detalle->acompanante_id) == $key ? 'selected' : '' }}>{{ $value }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
                    <div class="form-group">
                        <button type="button" class="btn btn-primary" id="bt_agregar" style="margin-top: 25px">Agregar</button>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                    <div class="form-group">
                        <a class="btn btn-success" href="{{ route('acompanantes_create',[$tipo,0,0,0,$hospedaje->id]) }}" style="margin-top: 25px">Nuevo</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                <table id="detalles" class="table table-striped table-bordered table-condensed table-hover text-center">
                    <thead>
                        <tr>
                            <th>Opcion</th>
                            <th>Acompañante</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
            {{-- <div class="card">
                <div class="card-header bg-info">
                    <h5>Acompañantes:</h5>
                </div>
                <div class="card-body">
                </div>
            </div> --}}
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
        function deleteItem(hospedaje,detalle,acompanante)
        {
            $.ajax({ 
                // url:"{{route('hospedajes_acompanante_destroy',["hospedaje","detalle","acompanante"])}}",
                url:"/hospedajes/"+hospedaje+"/detalle/"+detalle+"/acompanante/"+acompanante+"/destroy",
                type: "POST", 
                data:{
                    '_token': $('meta[name=csrf-token]').attr("content"),
                    'hospedaje':hospedaje,
                    'detalle':detalle,
                    'acompanante':acompanante,
                    '_method':'DELETE'
                },
                success: function(result) {
                    location.reload();
                }
            }); 
        } 
    </script>
    <script>
        $(document).ready(function(){
            $('#bt_agregar').click(function(){
                agregar();
            });
        });
        var cont=0;
        var fila = 0;
        total=0;
        subtotal=[];
        $("#cancelar").show();
        $("#guardar").hide();
        function agregar()
        {
            acompañante_id = $('#pacompañante_id').val();
            acompañante=$("#pacompañante_id option:selected").text();
            console.log(acompañante_id);
            
            if (acompañante_id!="")
            {
                if (existAcompañanteInDetail(acompañante_id) == false)
                {
                    fila = '<tr class="selected text-center" id="fila'+cont+'">\
                                <th>\
                                    <button type="button" class="btn btn-danger" onclick="eliminar('+cont+');">X</button>\
                                </th>\
                                <td>\
                                    <input type="hidden" name="acompañante_id[]" value="'+acompañante_id+'">'+acompañante+'\
                                </td>\
                            </tr>';
                    cont++;
                    limpiar();
                    $('#detalles').append(fila);
                }
                else
                {
                    limpiar();
                    alert("El acompañante ya esta agregado");
                }								
            }
            else
            {
                limpiar();
                alert("Error al ingresar el acompañante");
            }
        }
        function existAcompañanteInDetail(id)
        {
            var res = false;
            $('input[name="acompañante_id[]"]').each(function(index, item) {
                if (item.value == id) {
                    res = true;
                }
            });
            return res;
        }
        function limpiar()
        {
            $('#pacompañante_id').val('').change();
        }
        function eliminar(index)
        {
            $('#fila'+index).remove();
        }
    </script>
@endpush