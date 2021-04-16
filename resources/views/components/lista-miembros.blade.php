<div class="card">
    <div class="card-header">
        <h6 class="text-indigo-700">Lista de miembros</h6>
        @if (session('message'))
            <p class="text-success">{{ session('message') }}</p>
        @endif
    </div>
    <div class="card-body">
        <table class="table table-striped">
            <thead><tr>
                <th scope="col">Nombre</th>  
                <th scope="col">correo</th>
                <th scope="col">Director</th>
                <th scope="col">Alergias</th>
                <th scope="col">Editar</th>
                <th scope="col">Ver</th>
            </tr></thead>

            <tbody> 
                @foreach ($list as $miembro)
                    <tr>
                        <td class="fw-bold">  
                            <a href="/miembros/{{ $miembro->id }}">{{ $miembro->nombre }}</a>
                        </td>
                        <td class="fw-bold"> {{ $miembro->user->email }}</td>
                        <td class="fw-bold"> foobar </td>
                        @if ($miembro->confirmaAlergias == 'si')
                            <td class="fw-bold"> {{ $miembro->alergia }}</td>    
                        @else
                            <td class="fw-bold"> N/A </td>    
                        @endif
                        
                        <td>
                            <a href="/miembros/edit/{{ $miembro->id }}">
                                <button class="btn btn-outline-warning" ><i class="fas fa-pen-square"></i></button>
                            </a>
                        </td>
                        <td>
                            <a href="/miembros/{{ $miembro->id }}">
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
