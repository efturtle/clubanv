{{-- Modal Trigger --}}
<span class="text-warning">Dar de baja</span>
<button class="btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#softDeleteClub" type="button"> <i class="fa fa-ban" aria-hidden="true"></i></button>

<!-- The Modal -->
<div class="modal fade" id="softDeleteClub" tabindex="-1" aria-labelledby="softDeleteClubLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h5 class="modal-title">¿Dar de baja a este usuario administrador?</h5>
                <button type="button" class="close" data-bs-dismiss="modal">×</button>
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
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
