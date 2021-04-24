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
                <th scope="col">Director Guias Mayores</th>
                <th scope="col">Director</th>
                <th scope="col">Cantidad de miembros</th>
                {{-- <th scope="col">Editar</th> --}}
                <th scope="col">Ver</th>
            </tr></thead>
            <tbody> 
                @foreach ($list as $clubs)
                    <tr>
                        <td class="fw-bold">  
                            <a href="{{ route('club.show', $clubs) }}">{{ $clubs->nombreClub }}</a>
                        </td>
                        @if ($clubs->directorGuiasMayores_id == null)
                            <td class="fw-bold">
                                <div class="flex justify-center">
                                    <button class="bg-green-400 center rounded w-1/2">Asignar</button>
                                </div>
                            </td>    
                        @else
                            <td class="fw-bold">hi</td>
                        @endif
                        @if (is_null($clubs->director))
                            <div class="flex justify-center">
                                <td><button class="bg-green-400 center rounded w-1/2">Asignar</button></td>
                            </div>
                        @else
                            <td class="fw-bold"> {{ $clubs->director->name }}</td>
                        @endif
                        
                        <td class="fw-bold"> Bajo Mantenimiento</td>
                        {{-- <td>
                            <a href="/club/edit/{{ $clubs->id }}">
                                <button class="btn btn-outline-warning" ><i class="fas fa-pen-square"></i></button>
                            </a>
                        </td> --}}
                        <td>
                            <a href="/club/{{ $clubs->id }}">
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
