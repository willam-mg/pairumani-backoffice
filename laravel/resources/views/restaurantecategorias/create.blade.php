@extends ('layouts.admin')
@section('header')
    <!-- Content Header (Page header) -->
    <h3 class="m-0 text-dark">Nuevo Restaurante Categoria</h3>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-12">
                    <ol class="breadcrumb" style="background-color: inherit">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
						<li class="breadcrumb-item"><a href="{{ route('restaurantecategorias_index') }}">Restaurante Categorias</a></li>
                        <li class="breadcrumb-item active">Nuevo Restaurante Categoria</li>
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
					<form method="POST" action="{{ route('restaurantecategorias_create') }}" enctype="multipart/form-data">
						@include('restaurantecategorias.form')
					</form>
				</div>
			</div>
    	</div>
	</div>
@endsection