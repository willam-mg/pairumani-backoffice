@extends ('layouts.admin')
@section('titulo','Inicio')
@section('contenido')
	<div class="section">
		<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
			<div class="content">
				<div id="message"></div>
				<div class="row">
					<div class="col-xs-12 col-sm-4 col-md-6 col-lg-6">
						<div class="card">
							<div class="card-header  card-header-rose">
								Reservas de lugares turisticos
							</div>
							<div class="card-body">
								<div id="tb_reservas_lugares">
								</div>

								<div class="p3 text-center">
									<a href="{{route('lugaresturisticos_index')}}" class="btn btn-primary btn-link">Ver mas</a>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xs-12 col-sm-4 col-md-6 col-lg-6">
						<div class="card">
							<div class="card-header  card-header-rose">
								Reservas de restaurantes
							</div>
							<div class="card-body">
								<div id="tb_reservas_restaurante">
								</div>
								<div class="p3 text-center">
									<a href="{{route('restaurantes_index')}}" class="btn btn-primary btn-link">Ver mas</a>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xs-12 col-sm-4 col-md-6 col-lg-6">
						<div class="card">
							<div class="card-header  card-header-rose">
								Reservas de cafeteria
							</div>
							<div class="card-body">
								<div id="tb_reservas_cafeteria">
								</div>
								<div class="p3 text-center">
									<a href="{{route('cafeteria_index')}}" class="btn btn-primary btn-link">Ver mas</a>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xs-12 col-sm-4 col-md-6 col-lg-6">
						<div class="card">
							<div class="card-header  card-header-rose">
								Reservas de habitacion
							</div>
							<div class="card-body">
								<div id="tb_reservas_habitacion">
								</div>
								<div class="p3 text-center">
									<a href="{{route('reservas')}}" class="btn btn-primary btn-link">Ver mas</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
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
								<a href="{{ route('usuarios_index')}}">
									<div class="card card-stats">
										<div class="card-header card-header-warning card-header-icon mb-3 text-left">
											<div class="card-icon">
												<i class="material-icons">face</i>
											</div>
											<p class="card-category">Usuarios</p>
											<h3 class="card-title">Usuarios <span class="ml-3">{{ count($usuarios) }}</span></h3>
										</div>
									</div>
								</a>
							</div>
						@endif
						@if(kvfj(Auth::user()->rol->permisos,'roles_index'))
							<div class="col-lg-3 col-md-6 col-sm-6">
								<a href="{{ route('roles_index')}}">
									<div class="card card-stats">
										<div class="card-header card-header-danger card-header-icon mb-3 text-left">
											<div class="card-icon">
												<i class="material-icons">privacy_tip</i>
											</div>
											<p class="card-category">Roles</p>
											<h3 class="card-title">Roles <span class="ml-3">{{ count($roles) }}</span></h3>
										</div>
									</div>
								</a>
							</div>
						@endif
						@if(kvfj(Auth::user()->rol->permisos,'habitacioncategorias_index'))
							<div class="col-lg-3 col-md-6 col-sm-6">
								<a href="{{ route('habitacioncategorias_index')}}">
									<div class="card card-stats">
										<div class="card-header card-header-info card-header-icon mb-3 text-left">
											<div class="card-icon">
												<i class="material-icons">assignment</i>
											</div>
											<p class="card-category">Habitacion Categorias</p>
											<h4 class="card-title">Habitacion Categorias <span class="ml-3">{{ count($habitacioncategorias) }}</span></h4>
										</div>
									</div>
								</a>
							</div>
						@endif
						@if(kvfj(Auth::user()->rol->permisos,'habitaciones_index'))
							<div class="col-lg-3 col-md-6 col-sm-6">
								<a href="{{ route('habitaciones_index',$habitacioncategorias->random(1)->first()->id) }}">
									<div class="card card-stats">
										<div class="card-header card-header-primary card-header-icon mb-3 text-left">
											<div class="card-icon">
												<i class="material-icons">assignment</i>
											</div>
											<p class="card-category">Habitaciones</p>
											<h3 class="card-title">Habitaciones <span class="ml-3">{{ count($habitaciones) }}</span></h3>
										</div>
									</div>
								</a>
							</div>
						@endif
						@if(kvfj(Auth::user()->rol->permisos,'restaurantecategorias_index'))
							<div class="col-lg-3 col-md-6 col-sm-6">
								<a href="{{ route('restaurantecategorias_index') }}">
									<div class="card card-stats">
										<div class="card-header card-header-info card-header-icon mb-3 text-left">
											<div class="card-icon">
												<i class="material-icons">assignment</i>
											</div>
											<p class="card-category">Restautante Categorias</p>
											<h4 class="card-title">Restautante Categorias <span class="ml-3">{{ count($restaurantecategorias) }}</span></h4>
										</div>
									</div>
								</a>
							</div>
						@endif
						@if(kvfj(Auth::user()->rol->permisos,'productos_index'))
							<div class="col-lg-3 col-md-6 col-sm-6">
								<a href="#">
									<div class="card card-stats">
										<div class="card-header card-header-warning card-header-icon mb-3 text-left">
											<div class="card-icon">
												<i class="material-icons">restaurant_menu</i>
											</div>
											<p class="card-category">Restautante Productos</p>
											<h4 class="card-title">Restautante Productos <span class="ml-3">{{ count($restauranteproductos) }}</span></h4>
										</div>
									</div>
								</a>
							</div>
						@endif
						@if(kvfj(Auth::user()->rol->permisos,'restaurantecategorias_index'))
							<div class="col-lg-3 col-md-6 col-sm-6">
								<a href="{{ route('restaurantecategorias_index') }}">
									<div class="card card-stats">
										<div class="card-header card-header-info card-header-icon mb-3 text-left">
											<div class="card-icon">
												<i class="material-icons">assignment</i>
											</div>
											<p class="card-category">Cafeteria Categorias</p>
											<h4 class="card-title">Cafeteria Categorias <span class="ml-3">{{ count($cafeteriacategorias) }}</span></h4>
										</div>
									</div>
								</a>
							</div>
						@endif
						@if(kvfj(Auth::user()->rol->permisos,'productos_index'))
							<div class="col-lg-3 col-md-6 col-sm-6">
								<a href="#">
									<div class="card card-stats">
										<div class="card-header card-header-warning card-header-icon mb-3 text-left">
											<div class="card-icon">
												<i class="material-icons">restaurant_menu</i>
											</div>
											<p class="card-category">Cafeteria Productos</p>
											<h4 class="card-title">Cafeteria Productos <span class="ml-3">{{ count($cafeteriaproductos) }}</span></h4>
										</div>
									</div>
								</a>
							</div>
						@endif
						@if(kvfj(Auth::user()->rol->permisos,'lugaresturisticos_index'))
							<div class="col-lg-3 col-md-6 col-sm-6">
								<a href="{{ route('lugaresturisticos_index') }}">
									<div class="card card-stats">
										<div class="card-header card-header-success card-header-icon mb-3 text-left">
											<div class="card-icon">
												<i class="material-icons">hiking</i>
											</div>
											<p class="card-category">Lugares Turisticos</p>
											<h4 class="card-title">Lugares Turisticos <span class="ml-3">{{ count($lugaresturisticos) }}</span></h4>
										</div>
									</div>
								</a>
							</div>
						@endif
						@if(kvfj(Auth::user()->rol->permisos,'transportes_index'))
							<div class="col-lg-3 col-md-6 col-sm-6">
								<a href="{{ route('transportes_index') }}">
									<div class="card card-stats">
										<div class="card-header card-header-danger card-header-icon mb-3 text-left">
											<div class="card-icon">
												<i class="material-icons">directions_car</i>
											</div>
											<p class="card-category">Transportes</p>
											<h4 class="card-title">Transportes <span class="ml-3">{{ count($transportes) }}</span></h4>
										</div>
									</div>
								</a>
							</div>
						@endif
						@if(kvfj(Auth::user()->rol->permisos,'eventos_index'))
							<div class="col-lg-3 col-md-6 col-sm-6">
								<a href="{{ route('eventos_index') }}">
									<div class="card card-stats">
										<div class="card-header card-header-info card-header-icon mb-3 text-left">
											<div class="card-icon">
												<i class="material-icons">event</i>
											</div>
											<p class="card-category">Eventos</p>
											<h4 class="card-title">Eventos <span class="ml-3">{{ count($eventos) }}</span></h4>
										</div>
									</div>
								</a>
							</div>
						@endif
						@if(kvfj(Auth::user()->rol->permisos,'clientes_index'))
							<div class="col-lg-3 col-md-6 col-sm-6">
								<a href="{{ route('clientes_index') }}">
									<div class="card card-stats">
										<div class="card-header card-header-danger card-header-icon mb-3 text-left">
											<div class="card-icon">
												<i class="material-icons">people_alt</i>
											</div>
											<p class="card-category">Clientes</p>
											<h4 class="card-title">Clientes <span class="ml-3">{{ count($clientes) }}</span></h4>
										</div>
									</div>
								</a>
							</div>
						@endif
						@if(kvfj(Auth::user()->rol->permisos,'acompanantes_index'))
							<div class="col-lg-3 col-md-6 col-sm-6">
								<a href="#">
									<div class="card card-stats">
										<div class="card-header card-header-primary card-header-icon mb-3 text-left">
											<div class="card-icon">
												<i class="material-icons">people_alt</i>
											</div>
											<p class="card-category">Acompañantes</p>
											<h4 class="card-title">Acompañantes <span class="ml-3">{{ count($acompañantes) }}</span></h4>
										</div>
									</div>
								</a>
							</div>
						@endif
						@if(kvfj(Auth::user()->rol->permisos,'promociones_index'))
							<div class="col-lg-3 col-md-6 col-sm-6">
								<a href="{{ route('promociones_index') }}">
									<div class="card card-stats">
										<div class="card-header card-header-success card-header-icon mb-3 text-left">
											<div class="card-icon">
												<i class="material-icons">campaign</i>
											</div>
											<p class="card-category">Promociones</p>
											<h4 class="card-title">Promociones <span class="ml-3">{{ count($promociones) }}</span></h4>
										</div>
									</div>
								</a>
							</div>
						@endif
					@endif
				</div>
			</section>
		</div>
	</div>
	@if(kvfj(Auth::user()->rol->permisos,'habitaciones_index'))
		<div class="content">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12 ml-auto mr-auto">
						<div class="page-categories">
							<h3 class="title text-center">Habitaciones</h3>
							<br/>
							<ul class="nav nav-pills nav-pills-warning nav-pills-icons justify-content-center" role="tablist">
								@foreach($habitacioncategorias as $categoria)
									<li class="nav-item">
										<a class="nav-link" data-toggle="tab" href="#section-{{$categoria->id}}" role="tablist">
											<i class="material-icons">assignment</i> {{ $categoria->nombre }}
										</a>
									</li>							
								@endforeach
							</ul>
							<div class="tab-content tab-space tab-habitaciones">
								@foreach ($habitacioncategorias as $categoria)
									<div class="tab-pane" id="section-{{ $categoria->id }}">
										<div class="content">
											<div class="row">
												@foreach ($categoria->habitaciones()->where('estado','Disponible')->get() as $habitacion)
													<div class="col-md-2 col-sm-2 col-lg-2 col-xs-2">
														<a href="{{ route('reservas_create',[$habitacion->id]) }}">
															<div class="card">
																<div class="card-header text-center">
																	<h4 class="card-title">
																		{{ $habitacion->nombre }} <br>
																		{{ $habitacion->estado }} <i class="material-icons" style="color: green">fiber_manual_record</i>
																	</h4>
																	<p class="card-categoria">
																		<img src="{{ $habitacion->fotourl }}" alt="{{ $habitacion->nombre }}" height="120px" width="120px" class="img-">
																	</p>
																</div>
																
															</div>
														</a>
													</div>												
												@endforeach
											</div>
										</div>
									</div>								
								@endforeach
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	@endif

	<audio id="sonido" muted="muted">
		<source src="{{ asset('/sound/pedido.wav') }}" type="audio/wav">
	</audio>
	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/3.0.1/socket.io.js"></script>
	
	<script>
		var APP_URL = {!! json_encode(url('/')) !!}

		const socket = io('https://socket.pairumani.rnova-services.com/');
		let message = document.getElementById('message');
		
		const audio = document.getElementById("sonido");
		loadTables();

		socket.on('chat:message', function (data) {
			message.innerHTML += `<div class="alert alert-success" role="alert">
				<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
				Se registraron nuevas reservas
				</div>`;
			
			audio.play();
			loadTables();
			setTimeout(() => {
				message.innerHTML = '';
			}, 5000);
			
		});

		function loadTables(){
			loadData('tb_reservas_lugares', '/ajax/reservas-lugares');
			loadData('tb_reservas_restaurante', '/ajax/reservas-restaurante');
			loadData('tb_reservas_cafeteria', '/ajax/reservas-cafeteria');
			loadData('tb_reservas_habitacion', '/ajax/reservas-habitacion');
		}


		function loadData(tableElement, url) {
			$.ajax({
				type: 'GET',
				url: APP_URL+url,
				dataType: 'html',
				success: function (data) {
					$('#'+tableElement).empty().append($(data)); 
				},
				error: function (data) {
					var errors = data.responseJSON;
					if (errors) {
						$.each(errors, function (i) {
							console.log(errors[i]);
						});
					}
				}
			});
		}
	</script>
@endsection

