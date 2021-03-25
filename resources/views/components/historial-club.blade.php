<div class="card">
    <div class="card-header">
        <h6>Historial de Creacion</h6>
            @if (session('message'))
                <p class="text-success">{{ session('message') }}</p>
            @endif
    </div>
    <div class="card-body">
        <table class="table table-striped">
            <thead><tr>
                <th scope="col">Nombre del Club</th>  
                <th scope="col">Usuario</th>
                <th scope="col">Director</th>
                <th scope="col">Cantidad de miembros</th>
                <th scope="col">Editar</th>
                <th scope="col">Ver</th>
            </tr></thead>

            <tbody> 
                @foreach ($list as $clubs)
                    <tr>
                        <td class="fw-bold">  
                            {{-- {{ route('club.show', $club) }} --}}
                            <a href="{{ route('club.show', $clubs) }}">{{ $clubs->nombreClub }}</a>
                        </td>
                        <td class="fw-bold"> foobar</td>
                        <td class="fw-bold"> {{ $clubs->director }}</td>
                        <td class="fw-bold"> barfoo</td>
                        <td>
                            <a href="/club/edit/{{ $clubs->id }}">
                                <button class="btn btn-outline-warning" ><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                            </a>
                        </td>
                        <td>
                            <a href="/club/{{ $clubs->id }}">
                                <button class="btn btn-outline-info"><i class="fa fa-plus-square-o" aria-hidden="true"></i></button>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="card-footer">
    </div>
</div>
