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
                <th scope="col">Editar</th>
                <th scope="col">Ver</th>
            </tr></thead>
            <tbody> 
                @foreach ($list as $user)
                    <tr>
                        <td class="fw-bold"> {{ $user->name }}</td>
                        <td class="fw-bold"> {{ $user->email }}</td>
                        <td>
                            <a href="/user/{{ $user->id }}/edit">
                                <button class="btn btn-outline-warning" ><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                            </a>
                        </td>
                        <td>
                            <a href="/user/{{ $user->id }}">
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
