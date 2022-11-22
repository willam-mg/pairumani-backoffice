@extends ('layouts.admin')
@section ('contenido')
	<div class="box-admin">
		<div class="col-md-4 offset-md-4">
			<div class="card bg-danger">
				<div class="card-header">
					<div class="card-tittle text-center">
						<h2>Acceso Restringido</h2>
					</div>
					<div class="card-body text-center">
						<img src="{{ asset('imagenes/seguridad.png')}}">
						<hr>
						<strong class="text-center">
							<p class="text-center"><h3>Usted no tiene acceso a esta sección</h3></p>
						</strong>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection