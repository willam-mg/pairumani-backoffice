@extends('layouts.admin')
@section('header')
    <!-- Content Header (Page header) -->
    <h3 class="m-0 text-dark">Reserva hospedaje</h3>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-12">
                    <ol class="breadcrumb" style="background-color: inherit">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('promociones_index') }}">Promociones</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('promociones_show',$promocion->id) }}">Promocion: {{ $promocion->nombre }}</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('promocionreservas_index',$promocion->id) }}">Reservas</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('promocionreservas_show',[$promocion->id,$reserva->id]) }}">Reserva {{ $reserva->id }}</a></li>
                        <li class="breadcrumb-item active">Reserva hospedaje</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div>
    </div>
    <!-- /.content-header -->
@endsection
@section('contenido')
    <form method="POST" action="{{ route('promocionreservas_hospedaje',[$promocion->id,$reserva->id]) }}">
        @csrf
        <div class="row">
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="card">
                    <div class="card-header bg-info">
                        <h3>Detalle Información Hospedaje:</h3>
                    </div>
                    <div class="card-body">
                        <div class="row" style="font-size: 20px">
                            <div class="col-lg-7 col-sm-7 col-md-7 col-xs-12">
                                <h3 class="card-title"><b>Cliente:</b></h3>
                                <b>Nombres y Apellidos:</b> {{ $reserva->cliente->nombrecompleto }}<br>
                                <b>Email:</b> {{ $reserva->cliente->email }} <br>
                                <b>Telefonos:</b> {{ $reserva->cliente->telefono }} - {{ $reserva->cliente->celular }} <br>
                                <b>Tipo Documento:</b> {{ $reserva->cliente->tipo_documento }} <br>
                                <b>Número Documento:</b> {{ $reserva->cliente->num_documento }} <br>
                                <b>Pais:</b> {{ $reserva->cliente->pais }} <br>
                                <b>Ciudad:</b> {{ $reserva->cliente->ciudad }} <br><br><br>
                            </div>
                            <div class="col-lg-5 col-sm-5 col-md-5 col-xs-12">                    
                                <h3 class="card-title"><b>Habitación</b></h3>
                                <b>Nombre:</b> {{ $reserva->habitacion->nombre }}<br>
                                <b>Número Habitacion:</b> {{ $reserva->habitacion->num_habitacion }} <br>
                                <b>Precio:</b> {{ $reserva->habitacion->precio }} <br>
                            </div>
                            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                <h3 class="card-title"><b>Promoción:</b></h3>
                                <b>Promoción:</b> {{ $promocion->nombre }}<br>
                                <b>Descripción:</b> {!! $promocion->descripcion !!} <br>
                                <b>Precio:</b> {{ $promocion->precio }} <br>
                            </div>
                            <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                                <h3 class="card-title"><b>Reserva:</b></h3>
                                <b>Checkin:</b> {{ $reserva->checkin }}<br>
                                <b>Checkout:</b> {{ $reserva->checkout }} <br>
                                <b>Adultos:</b> {{ $reserva->adultos }} <br>
                                <b>Niños:</b> {{ $reserva->niños }} <br><br><br>
                            </div>
                            <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                                <button class="btn btn-primary" type="submit">
                                    <i class="material-icons">save</i> Guardar
                                </button>
                                <a href="{{ route('promocionreservas_index',[$promocion->id,$reserva->id]) }}" class="btn btn-danger">
                                    <i class="material-icons">clear</i> Cancelar
                                </a><br><br>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="card">
                    <div class="card-header bg-info">
                        <h3>Acompañantes:</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-5 col-sm-5 col-md-5 col-xs-5">
                                <div class="form-group">
                                    <label>Acompañante</label>
                                    <select name="pacompañante_id" class="form-control select2bs4" id="pacompañante_id">
                                        <option value>Seleccione un Acompañante</option>
                                        @foreach($acompañantes as $key=>$value)
                                            <option value="{{ $key }}" {{ old('acompanante_id', $hospedaje->acompanante_id) == $key ? 'selected' : '' }}>{{ $value }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-3 col-md-3 col-xs-3">
                                <div class="form-group">
                                    <button type="button" class="btn btn-primary" id="bt_agregar" style="margin-top: 25px">Agregar</button>
                                </div>
                            </div>
                            <div class="col-lg-4 col-sm-4 col-md-4 col-xs-4">
                                <div class="form-group">
                                    <a class="btn btn-success" href="{{ route('acompanantes_create',[$tipo,0,0,$reserva->id,0,$promocion->id]) }}" style="margin-top: 25px">Nuevo Acompañante</a>
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
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
@push('scripts')
    <script>
        $(document).ready(function(){
            $('#bt_agregar').click(function(){
                agregar();
            });
        });
        var cont=0;
        var fila = 0;
        function agregar()
        {
            acompañante_id = $('#pacompañante_id').val();
            acompañante=$("#pacompañante_id option:selected").text();
            
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