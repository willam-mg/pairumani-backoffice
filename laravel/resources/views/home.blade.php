@extends ('layouts.admin')
@section('titulo','Inicio')
@section('contenido')
	<div class="section">
		<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
			<section class="content">
				<div class="row">
					@if(Auth::user()->rol_id == null)
						<div class="alert alert-dismissable alert-danger">
							<button type="button" class="close" data-dismiss="alert"></button>
							<h4>Mensaje del sistema!</h4><br>
							<h2>Usted no cuenta con ningun rol asigando, comuniquese con el administrador del sistema porfavor</h2>							
						</div>
					@else						
						@if(kvfj(Auth::user()->rol->permisos,'usuarios_index'))
							<div class="col-lg-3 col-md-6 col-sm-6">
								<div class="card card-stats">
									<div class="card-header card-header-warning card-header-icon">
										<div class="card-icon">
											<i class="material-icons">people_alt</i>
										</div>
										<p class="card-category">Usuarios</p>
										<h3 class="card-title">{{ $usuarios }}</h3>
									</div>
									<div class="card-footer">
										<div class="stats">
											<a href="{{ route('usuarios_index')}}">Más información</a>
										</div>
									</div>
								</div>
							</div>
						@endif
						@if(kvfj(Auth::user()->rol->permisos,'usuariosapp_index'))
							<div class="col-lg-3 col-md-6 col-sm-6">
								<div class="card card-stats">
									<div class="card-header card-header-info card-header-icon">
										<div class="card-icon">
											<i class="material-icons">people_alt</i>
										</div>
										<p class="card-category">Usuariosapp</p>
										<h3 class="card-title">{{ $usuariosapp }}</h3>
									</div>
									<div class="card-footer">
										<div class="stats">
											<a href="{{ route('usuariosapp_index')}}">Más información</a>
										</div>
									</div>
								</div>
							</div>
						@endif
						@if(kvfj(Auth::user()->rol->permisos,'categorias_index'))
							<div class="col-lg-3 col-md-6 col-sm-6">
								<div class="card card-stats">
									<div class="card-header card-header-success card-header-icon">
										<div class="card-icon">
											<i class="material-icons">assignment</i>
										</div>
										<p class="card-category">Categorias</p>
										<h3 class="card-title">{{ $categorias }}</h3>
									</div>
									<div class="card-footer">
										<div class="stats">
											<a href="{{ route('categorias_index')}}">Más información</a>
										</div>
									</div>
								</div>
							</div>
						@endif
						@if(kvfj(Auth::user()->rol->permisos,'roles_index'))
							<div class="col-lg-3 col-md-6 col-sm-6">
								<div class="card card-stats">
									<div class="card-header card-header-warning card-header-icon">
										<div class="card-icon">
											<i class="material-icons">privacy_tip</i>
										</div>
										<p class="card-category">Roles</p>
										<h3 class="card-title">{{ $roles }}</h3>
									</div>
									<div class="card-footer">
										<div class="stats">
											<a href="{{ route('roles_index')}}">Más información</a>
										</div>
									</div>
								</div>
							</div>
						@endif
						@if(kvfj(Auth::user()->rol->permisos,'comercios_index'))
							<div class="col-lg-3 col-md-6 col-sm-6">
								<div class="card card-stats">
									<div class="card-header card-header-danger card-header-icon">
										<div class="card-icon">
											<i class="material-icons">dining</i>
										</div>
										<p class="card-category">Comercios</p>
										<h3 class="card-title">{{ $comercios }}</h3>
									</div>
									<div class="card-footer">
										<div class="stats">
											<a href="{{ route('comercios_index')}}">Más información</a>
										</div>
									</div>
								</div>
							</div>
						@endif
						@if(kvfj(Auth::user()->rol->permisos,'departamentos_index'))
							<div class="col-lg-3 col-md-6 col-sm-6">
								<div class="card card-stats">
									<div class="card-header card-header-primary card-header-icon">
										<div class="card-icon">
											<i class="material-icons">location_city</i>
										</div>
										<p class="card-category">Departamentos</p>
										<h3 class="card-title">{{ $departamentos }}</h3>
									</div>
									<div class="card-footer">
										<div class="stats">
											<a href="{{ route('departamentos_index')}}">Más información</a>
										</div>
									</div>
								</div>
							</div>
						@endif
						@if(kvfj(Auth::user()->rol->permisos,'pagos_index'))
							<div class="col-lg-3 col-md-6 col-sm-6">
								<div class="card card-stats">
									<div class="card-header card-header-danger card-header-icon">
										<div class="card-icon">
											<i class="material-icons">attach_money</i>
										</div>
										<p class="card-category">Pagos</p>
										<h3 class="card-title">{{ $pagos }}</h3>
									</div>
									<div class="card-footer">
										<div class="stats">
											<a href="{{ route('pagos_index')}}">Más información</a>
										</div>
									</div>
								</div>
							</div>
						@endif
					@endif
				</div>
			</section>
		</div>
	</div>
@endsection