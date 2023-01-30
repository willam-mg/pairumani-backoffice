<div class="modal fade modal-slide-in-rigth" aria-hidden="true" role="dialog" tabindex="-1" id="modal-delete-{{$cliente->id}}">
	<form method="POST" action="{{ route('clientes_destroy',$cliente->id) }}">
		@csrf @method('DELETE')
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Eliminar Cliente</h4>
					<button type="button" class="close" data-dismiss="modal" aria-Label="close">
						<span aria-hiden="true">x</span>
					</button>
				</div>
				<div class="modal-body">
					<p>Confirme si desea Eliminar el Cliente</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
					<button type="submit" class="btn btn-primary">Confirmar</button>
				</div>
			</div>
		</div>			
	</form>
</div>