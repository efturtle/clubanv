{{-- Modal Trigger --}}
<div>
    <span class="text-yellow-600 mr-2">Dar de baja</span>
    <button class="btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#softDeleteClub"> <i class="fa fa-ban" aria-hidden="true"></i></button>
</div>

<!-- The Modal -->
<div class="modal fade" id="softDeleteClub">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h5 class="modal-title">¿Dar de baja a este club?</h5>
                <button type="button" class="close" data-bs-dismiss="modal">×</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <h5>Esta accion da de baja temporal al club <mark class="text-uppercase">{{ $clubs->nombreClub }} </mark></h5>
                <form action="{{ route('club.delete', $clubs) }}" method="post">
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