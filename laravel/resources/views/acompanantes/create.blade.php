@extends ('layouts.admin')

@section('header')
    <!-- Content Header (Page header) -->
    <h3 class="m-0 text-dark">Nuevo Acompañante</h3>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-12">
                    <ol class="breadcrumb" style="background-color: inherit">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
						<li class="breadcrumb-item"><a href="{{ route('clientes_index') }}">Clientes</a></li>
						<li class="breadcrumb-item"><a href="{{ route('clientes_show',$cliente->id) }}">Cliente: {{ $cliente->nombres.' '.$cliente->apellidos }}</a></li>
						<li class="breadcrumb-item"><a href="{{ route('acompanantes_index',$cliente->id) }}">acompanantes</a></li>
                        <li class="breadcrumb-item active">Nuevo Acompañante</li>
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
					<form method="POST" action="{{ route('acompanantes_create',[$cliente->id,$tipo,$categoria,$habitacion,$reserva,$hospedaje,$promocion]) }}">
						@include('acompanantes.form')
					</form>
				</div>
			</div>
    	</div>
	</div>
@endsection