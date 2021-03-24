<div class="card">
    <div class="card-header">
        <h6>Historial de Creacion</h6>
    </div>
    <div class="card-body">
        <table class="table table-striped">
            <thead><tr>
                <th scope="col">Nombre del Club</th>  
                <th scope="col">Usuario</th>
                <th scope="col">Director</th>
                <th scope="col">Cantidad de miembros</th>
                <th scope="col">Editar</th>
                <th scope="col">Baja</th>
            </tr></thead>

            <tbody> 
                @foreach ($list as $club)
                    <tr>
                        <td class="fw-bold">  
                            {{-- {{ route('club.show', $club) }} --}}
                            <a href="{{ route('club.show', $club) }}">{{ $club->nombreClub }}</a>
                        </td>
                        <td class="fw-bold"> foobar</td>
                        <td class="fw-bold"> {{ $club->director }}</td>
                        <td class="fw-bold"> barfoo</td>
                        <td>
                            <button class="btn btn-outline-warning" ><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                        </td>
                        <td>
                            <button class="btn btn-outline-danger"> <i class="fa fa-ban" aria-hidden="true"></i></button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="card-footer">
    </div>
</div>
