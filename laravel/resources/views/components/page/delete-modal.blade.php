<div>
    <div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1" id="modal-delete-{{$model->id}}">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Eliminar Habitación Categoria</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">x</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Confirme si desea Elimnar el Habitación Categoria</p>
                </div>
                <div class="modal-footer">
                    <form method="POST" action="{{ route($route, $model->id) }}">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn btn-default" data-dismiss="modal"> Cerrar </button>
                        <button name="confirmar" type="submit" class="btn btn-primary"> Confirmar </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- habitacioncategorias_destroy --}}