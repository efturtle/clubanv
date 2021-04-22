<div class="card">
    <div class="card-header">
        <h6 class="text-indigo-700">Lista de usuarios</h6>
        @if (session('message'))
            <p class="text-success">{{ session('message') }}</p>
        @endif
    </div>
    <div class="card-body">
        <table class="table table-striped">
            <thead><tr>
                <th scope="col">Nombre</th>  
                <th scope="col">Correo</th>
                <th scope="col">Rol</th>
                <th scope="col">Asignado</th>
                <th scope="col">Editar</th>
                <th scope="col">Ver</th>
            </tr></thead>
            <tbody> 
                @foreach ($list as $director)
                    <tr>
                        <td class="fw-bold"> {{ $director->user->name }}</td>
                        <td class="fw-bold"> {{ $director->user->email }}</td>
                        @switch($director->rol)
                            @case(1)
                                <td>Director</td>
                            @break
                            @case(2)
                                <td>Secretari@</td>
                                @break
                            @case(3)
                                <td>Encargad@</td>
                                @break
                            @case(4)
                                <td>Pastor</td>
                                @break
                            @case(5)
                                <td>Coordinador</td>
                                @break
                            @case(6)
                                <td>Director de Club</td>
                                @break
                            @case(7)
                                <td>Director de Categoria</td>
                                @break
                            @default
                                <td>admin</td>
                        @endswitch
                        <td class="fw-bold"> {{ $director->asignado }}</td>
                        <td>
                            <a href="/user/{{ $director->id }}/edit">
                                <button class="btn btn-outline-warning" ><i class="fas fa-pen-square"></i></button>
                            </a>
                        </td>
                        <td>
                            <a href="/user/{{ $director->id }}">
                                <button class="btn btn-outline-info"><i class="fas fa-plus-circle"></i></button>
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
