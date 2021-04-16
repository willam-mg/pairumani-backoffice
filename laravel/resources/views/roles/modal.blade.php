<div class="modal fade" id="modal-delete-{{$rol->id}}" tabindex="-1" role="dialog" aria-labelledby="modal-deleteLabel" aria-hidden="true">
	<form method="POST" action="{{ route('roles_destroy',$rol->id) }}">
		@csrf @method('DELETE')
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="modal-deleteLabel">Eliminar Rol</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<p>Confirme si desea Eliminar el Rol</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
					<hr>
					<button type="submit" class="btn btn-primary">Confirmar</button>
				</div>
			</div>
		</div>
	</form>
</div>