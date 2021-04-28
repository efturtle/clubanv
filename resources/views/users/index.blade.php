<x-app-layout>
    <x-user-slot/>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <table class="table table-striped">
                        <thead><tr>
                            <th scope="col">Nombre</th>  
                            <th scope="col">Correo</th>
                            <th scope="col">Rol</th>
                            <th scope="col">Asignado</th>
                            {{-- <th scope="col">Editar</th> --}}
                            <th scope="col">Ver</th>
                        </tr></thead>
                        <tbody> 
                            @foreach ($directors as $director)
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
                                    @if ($director->asignado == 1)
                                        <td>Si</td>
                                    @else
                                        <td>No</td>
                                    @endif
                                    
                                    {{-- <td>
                                        <a href="/maintenance">
                                            <button class="btn btn-outline-warning" ><i class="fas fa-pen-square"></i></button>
                                        </a>
                                    </td> --}}
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
            </div>
        </div>
    </div>
</x-app-layout>