<div class="modal fade modal-slide-in-rigth" aria-hidden="true" role="dialog" tabindex="-1" id="modal-delete-{{$frigobar->id}}">
	<form method="POST" action="{{ route('habitacionfrigobar_destroy',[$categoria->id,$habitacion->id,$frigobar->id]) }}">
		@csrf @method('DELETE')
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Eliminar frigobar</h4>
					<button type="button" class="close" data-dismiss="modal" aria-Label="close">
						<span aria-hiden="true">x</span>
					</button>
				</div>
				<div class="modal-body">
					<p>Confirme si desea Eliminar el frigobar</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
					<button type="submit" class="btn btn-primary">Confirmar</button>
				</div>
			</div>
		</div>			
	</form>
</div>