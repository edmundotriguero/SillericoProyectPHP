<div class="modal face modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1" id="modal-delete-{{$sa->id}}">
        {{Form::Open(array('action'=>array('VentasController@borrarSaldo',$sa->id),'method'=>'delete'))}}
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" >
                        <span aria-hidden="true">x</span>
                    </button>
                    <h4 class="modal-title">Eliminar Registro</h4>
                </div>
                <div class="modal-body">
                    <p>Esta Seguro de que desea Eliminar el Registro?</p>
                    <p>Esta accion no tiene retroceso</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary" >Confirmar</button>
                </div>
            </div>
        </div>
        {{Form::Close()}}
    
    </div>