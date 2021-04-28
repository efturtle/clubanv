{{-- Modal Trigger --}}
<span class="text-warning">Dar de baja</span>
<button class="btn btn-outline-warning" data-toggle="modal" data-target="#softDeleteClub"> <i class="fa fa-ban" aria-hidden="true"></i></button>

<!-- The Modal -->
<div class="modal fade" id="softDeleteClub">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h5 class="modal-title">¿Dar de baja a este usuario administrador?</h5>
                <button type="button" class="close" data-dismiss="modal">×</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <h5>Esta accion da de baja temporal al Usuario <mark class="text-uppercase">{{ $user->name }} </mark></h5>
                <form action="{{ route('user.delete', $user) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button class="btn btn-warning">Baja</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>