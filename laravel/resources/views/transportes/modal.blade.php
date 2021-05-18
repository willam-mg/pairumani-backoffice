<div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1" id="modal-delete-{{$transporte->id}}">
	<form method="POST" action="{{ route('transportes_destroy',$transporte->id) }}">
		@csrf @method('DELETE')
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Eliminar Transporte</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">x</span>					
					</button>
				</div>
				<div class="modal-body">
					<p>Confirme si desea Elimnar el Transporte</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
					<button name="confirmar" type="submit" class="btn btn-primary">Confirmar</button>
				</div>
			</div>
		</div>
	</form>
</div>