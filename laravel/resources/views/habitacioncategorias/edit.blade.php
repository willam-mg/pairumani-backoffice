@extends ('layouts.admin')
@section('header')
    <!-- Content Header (Page header) -->
    <h3 class="m-0 text-dark">Editar Habitación Categorias: {{ $categoria->nombre }}</h3>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-12">
                    <ol class="breadcrumb" style="background-color: inherit">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
						<li class="breadcrumb-item"><a href="{{ route('habitacioncategorias_index') }}">Habitación Categorias</a></li>
                        <li class="breadcrumb-item active">Editar Habitación Categorias</li>
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
					<form method="POST" action="{{ route('habitacioncategorias_edit',$categoria->id) }}" enctype="multipart/form-data">
						@include('habitacioncategorias.form')
					</form>
				</div>
			</div>
    	</div>
	</div>
@endsection