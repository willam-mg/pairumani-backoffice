@extends ('layouts.admin')
@section('header')
    <!-- Content Header (Page header) -->
    <h3 class="m-0 text-dark">Editar Reserva: {{ $reserva->id }}</h3>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-12">
                    <ol class="breadcrumb" style="background-color: inherit">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('promociones_index') }}">Promociones</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('promociones_show',$promocion->id) }}">Promocion: {{ $promocion->nombre }}</a></li>
                        <li class="breadcrumb-item active">Editar Reserva</li>
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
					<form method="POST" action="{{ route('promocionreservas_edit',[$promocion->id,$reserva->id]) }}">
						@include('reservaspromocion.form')
					</form>
				</div>
                <div class="col-md-4">
                    @include('reservaspromocion.promocion')
                </div>
			</div>
    	</div>
	</div>
@endsection