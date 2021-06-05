{{-- Modal Trigger --}}
<span class="text-warning">Dar de baja</span>
<button class="btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#softDeleteClub"> <i class="fa fa-ban" aria-hidden="true"></i></button>

<!-- The Modal -->
<div class="modal fade" id="softDeleteClub">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h5 class="modal-title">¿Dar de baja a {{ $miembro->user->name }}?</h5>
                <button type="button" class="close" data-bs-dismiss="modal">×</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <h5>Esta accion da de baja temporal al miembro <mark class="text-uppercase">{{ $miembro->user->name }} </mark></h5>
                <form action="{{ route('miembro.delete', $miembro) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button class="btn btn-warning">Baja</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>