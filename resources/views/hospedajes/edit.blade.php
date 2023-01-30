@extends ('layouts.admin')
@section('header')
    <!-- Content Header (Page header) -->
    <h3 class="m-0 text-dark">Editar Hospedaje: {{ $hospedaje->id }}</h3>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-12">
                    <ol class="breadcrumb" style="background-color: inherit">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
						<li class="breadcrumb-item"><a href="{{ route('hospedajes_index') }}">Hospedajes</a></li>
                        <li class="breadcrumb-item active">Editar Hospedaje</li>
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
				<div class="col-md-8">
					<form method="POST" action="{{ route('hospedajes_edit',$hospedaje->id) }}">
						@include('hospedajes.form')
					</form>
				</div>
                <div class="col-md-4">
                    @include('hospedajes.promocion')
                    @include('hospedajes.acompanantes')
                </div>
			</div>
    	</div>
	</div>
@endsection