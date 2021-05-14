<x-app-layout>
    <x-user-slot/>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if (session('message'))
                        <h6 class="text-success">{{ session('message') }}</h6>
                    @endif
                    <div class="flex justify-end">
                        <x-dropdown>
                            <x-slot name="trigger">
                                <button class="flex items-center rounded-full focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                                    <div>Filtros</div>
                                    <div class="ml-1">
                                        <i class="fas fa-filter"></i>
                                    </div>
                                </button>
                            </x-slot>
                            <x-slot name="content">
                                <a href="{{ route('filtro.usuario', 1) }}">
                                    <span class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out">
                                        Sin Asignar
                                    </span>
                                </a>
                                <a href="{{ route('filtro.usuario', 2) }}">
                                    <span class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out">
                                        Asignados
                                    </span>
                                </a>
                                <a href="{{ route('filtro.usuario', 3) }}">
                                    <span class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out">
                                        Directivos
                                    </span>
                                </a>
                            </x-slot>
                        </x-dropdown>
                    </div>
                    <br>
                    <table class="table table-sm table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Nombre</th>
                                <th scope="col">Correo</th>
                                <th scope="col">Rol</th>
                                <th scope="col">Asignado</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($directors as $director)
                                <tr>
                                    <td>
                                        <a href="{{ route('user.show', $director->user->id) }}">
                                            {{ $director->user->name }}
                                        </a>
                                    </td>
                                    <td> {{ $director->user->email }}</td>
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
                                            <td>Admin</td>
                                    @endswitch
                                    @if ($director->asignado == 1)
                                        <td>Si</td>
                                    @else
                                        <td>
                                            <a href="">
                                                <button class="bg-green-400 center rounded w-1/2 mt-2"><span class="text-gray-900">Asignar</span></button>
                                            </a>
                                        </td>
                                    @endif
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>