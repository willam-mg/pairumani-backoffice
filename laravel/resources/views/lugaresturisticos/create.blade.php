@extends ('layouts.admin')
@section('header')
    <!-- Content Header (Page header) -->
    <h3 class="m-0 text-dark">Nuevo Lugar Turistico</h3>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-12">
                    <ol class="breadcrumb" style="background-color: inherit">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
						<li class="breadcrumb-item"><a href="{{ route('lugaresturisticos_index') }}">Lugares Turisticoa</a></li>
                        <li class="breadcrumb-item active">Nuevo Lugar Turistico</li>
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
					<form method="POST" action="{{ route('lugaresturisticos_create') }}" enctype="multipart/form-data">
						@include('lugaresturisticos.form')
					</form>
				</div>
			</div>
    	</div>
	</div>
@endsection