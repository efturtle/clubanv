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
                <th scope="col">Club</th>
                <th scope="col">Categoria</th>
                <th scope="col">Editar</th>
                <th scope="col">Ver</th>
            </tr></thead>
            <tbody> 
                @foreach ($list as $user)
                    <tr>
                        <td class="fw-bold"> {{ $user->user->name }}</td>
                        <td class="fw-bold"> {{ $user->user->email }}</td>
                            <td class="fw-bold"> {{ $user->club }}</td>    
                            @switch($user->category)
                            @case(1)
                                <td class="fw-bold"> Aventureros</td>        
                                @break
                            @case(2)
                            <td class="fw-bold"> Conquistadores</td>        
                                @break
                            @case(3)
                            <td class="fw-bold">Guias Mayores</td>        
                                @break
                            @case('aventuras')
                            <td class="fw-bold">admin</td>        
                                @break
                            @default
                                
                        @endswitch
                        <td>
                            <a href="/user/{{ $user->id }}/edit">
                                <button class="btn btn-outline-warning" ><i class="fas fa-pen-square"></i></button>
                            </a>
                        </td>
                        <td>
                            <a href="/user/{{ $user->id }}">
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
