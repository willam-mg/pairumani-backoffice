@extends ('layouts.admin')
@section('header')
    <!-- Content Header (Page header) -->
    <h3 class="m-0 text-dark">Nueva Reserva</h3>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-12">
                    <ol class="breadcrumb" style="background-color: inherit">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
                        @if ($habitacion)
                            <li class="breadcrumb-item"><a href="{{ route('habitaciones_index') }}">habitaciones</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('habitaciones_show',[$habitacion->id]) }}">habitacion: {{ $habitacion->nombre }}</a></li>
                        @endif
                        <li class="breadcrumb-item active">Nueva Reserva</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div>
    </div>
    <!-- /.content-header -->
@endsection
@section ('contenido')
	<div class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-xs-12 col-sm-8 col-md-8 col-lg-8 col-centered ml-auto mr-auto">
					<form method="POST" action="{{ route('reservas_create',[$habitacion->id]) }}">
						@include('reservas.form')
					</form>
				</div>
                @if($habitacion)
                    @if($habitacion->promocion != NULL)
                        @if($habitacion->promocion->estado == 'Activo')
                            <div class="col-md-4">
                                @include('reservas.promocion')
                            </div>
                        @endif
                    @endif
                @endif
			</div>
    	</div>
	</div>
@endsection