{{-- Modal Trigger --}}
<div>
    <span class="text-danger ml-2">Eliminar Club</span>
    <button class="btn btn-outline-danger ml-1 mr-2" data-bs-toggle="modal" data-bs-target="#deleteClub"> <i class="fa fa-ban" aria-hidden="true"></i></button>
</div>


<!-- The Modal -->
<div class="modal fade" id="deleteClub">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h5 class="modal-title">¿Eliminar club?</h5>
                <button type="button" class="close" data-bs-dismiss="modal">×</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <h5>Esta accion no se puede deshacer, ¿Eliminar <mark class="text-uppercase">{{ $clubs->nombreClub }} </mark> ?</h5>
                <form action="{{ route('club.destroy', $clubs) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button class="btn btn-danger">Eliminar</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>