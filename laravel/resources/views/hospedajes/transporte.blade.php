@extends('layouts.admin')
@section('header')
    <!-- Content Header (Page header) -->
    <h3 class="m-0 text-dark">Hospedaje Transporte</h3>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-12">
                    <ol class="breadcrumb" style="background-color: inherit">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('hospedajes_index') }}">Hospedajes</a></li>
                        <li class="breadcrumb-item active">Hospedaje Transporte</li>
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
				<div class="col-md-8">
					<form method="POST" action="{{ route('hospedajes_transporte',$hospedaje->id) }}">
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
                                        <div class="form-group bmd-form-group {{ $errors->has('transporte_id') ? 'has-danger' : '' }}">
                                            <label>Transporte</label>
                                            <select name="ptransporte_id" class="form-control select2bs4" id="ptransporte_id">
                                                <option value>Seleccione una Transporte</option>
                                                @foreach($transportes as $transporte)
                                                    <option value="{{ $transporte->id }}_{{ $transporte->precio }}" {{ old('transporte_id', $detalle->transporte_id) == $transporte->id ? 'selected' : '' }}>{{ $transporte->nombre }}</option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('transporte_id'))
                                                <span id="transporte_id-error" for="transporte_id" class="error">{{ $errors->first('transporte_id') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12" style="margin-top: 20px;">
                                        <div class="form-group bmd-form-group {{ $errors->has('precio') ? 'has-danger' : '' }}">
                                            <label>Precio</label>
                                            <input disabled type="number" id="pprecio" name="pprecio" value="{{ old('precio') }}" class="form-control">
                                            @if ($errors->has('precio'))
                                                <span id="precio-error" for="preciog" class="error">{{ $errors->first('preciog') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-sm-3 col-md-3 col-xs-3">
                                        <div class="form-group">
                                            <button type="button" class="btn btn-primary" id="bt_agregar" style="margin-top: 25px">Agregar</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                                    <table id="detalles" class="table table-striped table-bordered table-condensed table-hover text-center">
                                        <thead>
                                            <tr>
                                                <th>Opcion</th>
                                                <th>Transporte</th>
                                                <th>Precio</th>
                                                <th>Sub Total</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <th>TOTAL</th>
                                            <th colspan="2"></th>
                                            <th><h4 id="total">Bs/. 0.00</h4><input type="hidden" name="total_venta" id="total_venta"></th>
                                        </tfoot>
                                        <tbody></tbody>
                                    </table>
                                </div>
                                <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12" id="cancelar">
                                    <div class="form-group">
                                        <button class="btn btn-primary" disabled type="submit">
                                            <i class="fa fa-save fa-lg"></i> Guardar
                                        </button>
                                        <a href="{{ route('hospedajes_index') }}" class="btn btn-danger">
                                            <i class="fa fa-ban"></i> Cancelar
                                        </a>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12" id="guardar">
                                    <div class="form-group">
                                        <button class="btn btn-primary" type="submit">
                                            <i class="fa fa-save fa-lg"></i> Guardar
                                        </button>
                                        <a href="{{ route('hospedajes_index') }}" class="btn btn-danger">
                                            <i class="fa fa-ban"></i> Cancelar
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
					</form>
				</div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header card-header-rose card-header-icon">
                            <div class="card-icon">
                                <i class="material-icons">assignment</i>
                            </div>
                        </div>
                        <div class="card-body">
                            <h3>Transportes</h3>
                            <table class="table">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>Transporte</th>
                                        <th>Precio</th>
                                        <th>Opciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(count($detalles))
                                        @foreach($detalles as $detalle)
                                            <tr>
                                                <td>{{ $detalle->transporte->nombre }}</td>
                                                <td>{{ $detalle->transporte->precio }}</td>
                                                <td>
                                                    <form method="POST" action="{{ route('hospedajes_transporte_destroy',[$hospedaje->id,$detalle->id,$detalle->transporte_id]) }}">
                                                        @csrf @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">X</button>
                                                    </form>
                                                </td>
                                            </tr>                                            
                                        @endforeach
                                    @else
                                        <tr>
											<td colspan="3" style="text-align: center;">
												<h2><span class="badge badge-danger" style="font-size: 20px">No Existen transportes</span></h2>
											</td>
										</tr>                                        
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
			</div>
    	</div>
	</div>
@endsection
@push('scripts')
    <script>
        $(document).ready(function(){
            $('#bt_agregar').click(function(){
                agregar();
            });
        });
        var cont=0;
        var fila=0;
        total=0;
        subtotal=[];
        $("#cancelar").show();
		$("#guardar").hide();
        $("#ptransporte_id").change(mostrarValores);
        function mostrarValores()
        {
            datosTransporte=document.getElementById('ptransporte_id').value.split('_');
            $("#pprecio").val(datosTransporte[1]);
        }
        function agregar()
        {
            datosTransporte=document.getElementById('ptransporte_id').value.split('_');
            transporte_id = datosTransporte[0];
            precio = datosTransporte[1];
            transporte=$("#ptransporte_id option:selected").text();
            
            if (transporte_id!="")
            {
                if (existTransporteInDetail(transporte_id) == false)
                {
                    subtotal[cont]= Number(precio);
					total=total+subtotal[cont];
                    fila = '<tr class="selected text-center" id="fila'+cont+'">\
                                <th>\
                                    <button type="button" class="btn btn-danger" onclick="eliminar('+cont+');">X</button>\
                                </th>\
                                <td>\
                                    <input type="hidden" name="transporte_id[]" value="'+transporte_id+'">'+transporte+'\
                                </td>\
                                <td>\
                                    <input type="hidden" name="precio[]" value="'+precio+'">'+precio+'\
                                </td>\
                                <td>'+subtotal[cont]+'</td>\
                            </tr>';
                    cont++;
                    limpiar();
                    $('#total').html("Bs/ " + Number(total).toFixed(2));
					$('#total_venta').val(Number(total).toFixed(2));
                    evaluar();
                    $('#detalles').append(fila);
                }
                else
                {
                    limpiar();
                    alert("El transporte ya esta agregado");
                }								
            }
            else
            {
                limpiar();
                alert("Error al ingresar el transporte");
            }
        }
        function existTransporteInDetail(id)
        {
            var res = false;
            $('input[name="transporte_id[]"]').each(function(index, item) {
                if (item.value == id) {
                    res = true;
                }
            });
            return res;
        }
        function limpiar()
        {
            $('#ptransporte_id').val('').change();
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