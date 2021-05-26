{{-- Modal Trigger --}}
<span class="text-danger">Eliminar Miembro</span>
<button class="btn btn-outline-danger" data-toggle="modal" data-target="#deleteClub"> <i class="fa fa-ban" aria-hidden="true"></i></button>

<!-- The Modal -->
<div class="modal fade" id="deleteClub">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h5 class="modal-title">¿Eliminar a {{ $miembro->user->name }}?</h5>
                <button type="button" class="close" data-dismiss="modal">×</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <h5>Esta accion no se puede deshacer, Confirmar la eliminacion<mark class="text-uppercase">{{ $miembro->user->name }} </mark> ?</h5>
                <form action="{{ route('miembro.destroy', $miembro) }}" method="post">
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