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
                <th scope="col">Usuario</th>
                <th scope="col">admin</th>
                <th scope="col">Alergias</th>
                <th scope="col">Editar</th>
                <th scope="col">Ver</th>
            </tr></thead>

            <tbody> 
                @foreach ($list as $miembro)
                    <tr>
                        <td class="fw-bold">  
                            <a href="#">{{ $miembro->nombre }}</a>
                        </td>
                        <td class="fw-bold"> {{ $miembro->usuario }}</td>
                        <td class="fw-bold"> foobar </td>
                        @if ($miembro->confirmaAlergias == 'si')
                            <td class="fw-bold"> {{ $miembro->alergia }}</td>    
                        @else
                            <td class="fw-bold"> N/A </td>    
                        @endif
                        
                        <td>
                            <a href="/miembros/edit/{{ $miembro->id }}">
                                <button class="btn btn-outline-warning" ><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                            </a>
                        </td>
                        <td>
                            <a href="/miembros/{{ $miembro->id }}">
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
