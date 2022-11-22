@csrf
<div class="card">
    <div class="card-header card-header-rose card-header-icon">
        <div class="card-icon">
            <i class="material-icons">assignment</i>
        </div>
    </div>
    <div class="card-body">
        <div class="form-group">
            <div class="form-group bmd-form-group {{ $errors->has('cliente_id') ? 'has-danger' : '' }}">
                <label for="cliente_id"><strong>Cliente</strong></label>
                <select name="cliente_id" class="form-control select2bs4">
                    <option>Seleccione un cliente</option>
                    @foreach ($clientes as $key => $value)
                        <option value="{{  $key }}" {{ old('cliente_id', $cafeteria->cliente_id) == $key ? 'selected' : '' }}>{{ $value }}</option>
                    @endforeach
                </select>
                @if ($errors->has('cliente_id'))
                    <span id="cliente_id-error" for="cliente_id" class="error">{{ $errors->first('cliente_id') }}</span>
                @endif
            </div>                
        </div>
        <div class="card">
            <div class="card-header bg-info pt-0 pb-0">
                <h3>Producto:</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-4 col-sm-4 col-md-4 col-xs-4">
                        <div class="form-group">
                            <label>Producto</label>
                            <select class="form-control select2bs4" id="pproducto_id">
                                <option value>Seleccione un Producto</option>
                                @foreach($productos as $producto)
                                    <option value="{{ $producto->id }}_{{ $producto->precio }}">{{ $producto->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-4 col-md-4 col-xs-4">
                        <div class="form-group bmd-form-group">
                            <label for="pprecio"><strong>Precio</strong></label><br>
                            <input type="number" disabled id="pprecio" value="{{ old('pprecio') }}" class="form-control">
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-4 col-md-4 col-xs-4">
                        <div class="form-group bmd-form-group {{ $errors->has('pcantidad') ? 'has-danger' : '' }}">
                            <label for="pcantidad"><strong>Cantidad</strong></label><br>
                            <input type="number" min="1" id="pcantidad" value="{{ old('pcantidad') }}" class="form-control">
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-3 col-md-3 col-xs-3">
                        <div class="form-group">
                            <label>Opcion</label>
                            <select class="form-control select2bs4" id="popcion_id">
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-3 col-md-3 col-xs-3">
                        <div class="form-group">
                            <label>Tamaño</label>
                            <select class="form-control select2bs4" id="ptamaño_id">
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-3 col-md-3 col-xs-3">
                        <div class="form-group bmd-form-group">
                            <label for="ppreciotamaño"><strong>Precio Tamaño</strong></label><br>
                            <input type="number" disabled id="ppreciotamaño" value="{{ old('ppreciotamaño') }}" class="form-control">
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-3 col-md-3 col-xs-3">
                        <div class="form-group">
                            <button type="button" class="btn btn-primary" id="bt_agregar" style="margin-top: 25px">Agregar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12" id="cancelar">
        <div class="form-group">
            <button class="btn btn-primary" disabled type="submit">
                <i class="fa fa-save fa-lg"></i> Guardar
            </button>
            <a href="{{ route('cafeteria_index') }}" class="btn btn-danger">
                <i class="fa fa-ban"></i> Cancelar
            </a>
        </div>
    </div>
    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12" id="guardar">
        <div class="form-group">
            <button class="btn btn-primary" type="submit">
                <i class="fa fa-save fa-lg"></i> Guardar
            </button>
            <a href="{{ route('cafeteria_index') }}" class="btn btn-danger">
                <i class="fa fa-ban"></i> Cancelar
            </a>
        </div>
    </div>
</div>
@push('scripts')
    <script>
        $("#pproducto_id").change(event => {
            $.get(`opciones/${event.target.value[0]}`,function(res,sta){
                $("#popcion_id").empty();
                res.forEach(element => {
                    $("#popcion_id").append(`<option value=${element.id}> ${element.nombre} </option>`);
                });
            });
        });
        $("#pproducto_id").change(event => {
            $.get(`tamanos/${event.target.value[0]}`,function(res,sta){
                $("#ptamaño_id").empty();
                res.forEach(element => {
                    $("#ptamaño_id").append(`<option value=${element.id}_${element.precio}> ${element.nombre} </option>`);
                });
            });
        });
        $("#pproducto_id").change(mostrarValores);
        $("#ptamaño_id").change(mostrarPrecio);
        function mostrarValores()
        {
            datos = document.getElementById('pproducto_id').value.split('_');
            $("#pprecio").val(datos[1]);
        }
        function mostrarPrecio()
        {
            datosTamaño = document.getElementById('ptamaño_id').value.split('_');
            $("#ppreciotamaño").val(datosTamaño[1]);
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
            datosProducto = document.getElementById('pproducto_id').value.split('_');
            datosTamaño = document.getElementById('ptamaño_id').value.split('_');
            producto_id = datosProducto[0];
            tamaño_id = datosTamaño[0];
            opcion_id = $("#popcion_id option:selected").val();
            producto = $("#pproducto_id option:selected").text();
            opcion = $("#popcion_id option:selected").text();
            tamaño = $("#ptamaño_id option:selected").text();
            cantidad = $("#pcantidad").val();
            precio = $("#pprecio").val();
            preciotamaño = $("#ppreciotamaño").val();
            if (producto_id != "" && opcion_id != "" && tamaño_id != "" && cantidad != "" && cantidad > 0 && precio != "" && preciotamaño != "")
            {
                suma = (parseInt(precio) + parseInt(preciotamaño));
                subtotal[cont] = (cantidad*suma);
                total = total + subtotal[cont];
                fila = '<tr class="selected text-center" id="fila'+cont+'">\
                            <td>\
                                <button type="button" class="btn btn-danger" onclick="eliminar('+cont+');">X</button>\
                            </td>\
                            <td>\
                                <input type="hidden" name="producto_id[]" value="'+producto_id+'">'+producto+'\
                            </td>\
                            <td>\
                                <input type="hidden" name="precio[]" value="'+precio+'">'+precio+'\
                            </td>\
                            <td>\
                                <input type="hidden" name="opcion_id[]" value="'+opcion_id+'">'+opcion+'\
                            </td>\
                            <td>\
                                <input type="hidden" name="tamaño_id[]" value="'+tamaño_id+'">'+tamaño+'\
                            </td>\
                            <td>\
                                <input type="hidden" name="preciotamaño[]" value="'+preciotamaño+'">'+preciotamaño+'\
                            </td>\
                            <td>\
                                <input class="txt-cantidad" type="hidden" name="cantidad[]" value="'+cantidad+'">\
                                <span class="span-cantidad">'+cantidad+'</span>\
                            </td>\
                            <td>'+subtotal[cont]+'</td>\
                        </tr>';
                cont++;
                limpiar();
                $('#total').html("Bs/ " + total);
                $('#total_venta').val(total);
                evaluar();
                $('#detalles').append(fila);
            }
            else
            {
                limpiar();
                alert("Error al ingresar el detalle de la reserva, revise los datos del producto");
            }
        }
        function existProductoInDetail(id)
        {
            var res = false;
            $('input[name="producto_id[]"]').each(function(index, item) {
                if (item.value == id) {
                    res = true;
                }else{
                    var cantidad = parseInt($(item).closest('tr').find('.txt-cantidad').eq(0).val());
                    if ((cantidad + 1) <= parseInt($("#pstock").val())) {
                        if ($("#pcantidad").val() != "") {
                            cantidad += parseInt($("#pcantidad").val());
                        } else {
                            cantidad++;
                        }
                        $(item).closest('tr').find('.txt-cantidad').eq(0).val(cantidad);
                        $(item).closest('tr').find('.span-cantidad').html(cantidad);
                    }
                }
            });
            return res;
        }
        function limpiar()
        {
            $('#pproducto_id').val('').change();
            $("#pcantidad").val("");
            $("#pprecio").val("");
            $("#ppreciotamaño").val("");
        }

        function evaluar()
        {
            if (total>0) 
            {
                $("#guardar").show();
                $("#cancelar").hide();
            }
            else
            {
                $("#guardar").hide();
                $("#cancelar").show();
            }
        }
        function eliminar(index)
        {
            total=total-subtotal[index];
            $('#total').html("Bs/. "+total);
            $('#total_venta').val(total);
            $('#fila'+index).remove();
            evaluar();
        }
    </script>
@endpush