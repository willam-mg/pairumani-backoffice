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
                        <li class="breadcrumb-item"><a href="{{ route('habitacioncategorias_index') }}">Categorias</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('habitacioncategorias_show',$categoria->id) }}">Categoria: {{ $categoria->nombre }}</a></li>
						<li class="breadcrumb-item"><a href="{{ route('habitaciones_index',$categoria->id) }}">habitaciones</a></li>
						<li class="breadcrumb-item"><a href="{{ route('habitaciones_show',[$categoria->id,$habitacion->id]) }}">habitacion: {{ $habitacion->nombre }}</a></li>
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
				<div class="col-md-8 ml-auto mr-auto">
					<form method="POST" action="{{ route('reservas_create',[$categoria->id,$habitacion->id]) }}">
						@include('reservas.form')
					</form>
				</div>
			</div>
    	</div>
	</div>
@endsection