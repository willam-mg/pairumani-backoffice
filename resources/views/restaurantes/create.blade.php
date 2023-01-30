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
						<li class="breadcrumb-item"><a href="{{ route('restaurantes_index') }}">Reservas Restaurante</a></li>
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
            <form method="POST" action="{{ route('restaurantes_create') }}">
                <div class="row">
                    <div class="col-xs-12 col-sm-7 col-md-7 col-lg-7 col-centered ml-auto mr-auto">
                        @include('restaurantes.form')
                    </div>
                    <div class="col-md-5">
                        @include('restaurantes.productos')
                    </div>
                </div>
            </form>
        </div>
	</div>
@endsection