@extends ('layouts.admin')
@section('header')
    <!-- Content Header (Page header) -->
    <h3 class="m-0 text-dark">Editar Cafeteria Categoria: {{ $categoria->nombre }}</h3>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-12">
                    <ol class="breadcrumb" style="background-color: inherit">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
						<li class="breadcrumb-item"><a href="{{ route('cafeteriacategorias_index') }}">Cafeteria Categoria</a></li>
                        <li class="breadcrumb-item active">Editar Cafeteria Categoria</li>
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
					<form method="POST" action="{{ route('cafeteriacategorias_edit',$categoria->id) }}" enctype="multipart/form-data">
						@include('cafeteriacategorias.form')
					</form>
				</div>
			</div>
    	</div>
	</div>
@endsection