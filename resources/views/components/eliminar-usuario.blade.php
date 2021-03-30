{{-- Modal Trigger --}}
<span class="text-danger">Eliminar Usuario</span>
<button class="btn btn-outline-danger" data-toggle="modal" data-target="#deleteUser"> <i class="fa fa-ban" aria-hidden="true"></i></button>

<!-- The Modal -->
<div class="modal fade" id="deleteUser">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h5 class="modal-title">¿Eliminar Usuario?</h5>
                <button type="button" class="close" data-dismiss="modal">×</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <h5>Esta accion no se puede deshacer, ¿Eliminar <mark class="text-uppercase">{{ $name }} </mark> ?</h5>
                <form action="/user/{{ $id }}" method="post">
                    @csrf
                    @method('DELETE')
                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button class="btn btn-danger">Eliminar</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>