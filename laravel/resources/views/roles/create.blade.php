@extends ('layouts.admin')
@section('header')
    <!-- Content Header (Page header) -->
    <div class="card">
        <div class="card-body py-3 justify-content-between align-items-center">
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="m-0 text-dark">Nuevo Rol</h3>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right" style="background-color: inherit">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
						<li class="breadcrumb-item"><a href="{{ route('roles_index') }}">Roles</a></li>
                        <li class="breadcrumb-item active">Nuevo Rol</li>
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
					<form method="POST" action="{{ route('roles_create') }}">
						@include('roles.form')
					</form>
				</div>
			</div>
    	</div>
	</div>
@endsection