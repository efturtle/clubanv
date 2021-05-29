<x-app-layout>
    <x-user-slot/>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if (session('message'))
                        <h6 class="text-success">{{ session('message') }}</h6>
                    @endif
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
                            @foreach ($names as $user)
                                @if (is_null($user->miembro))
                                <tr>
                                    <td>
                                        <a href="{{ route('user.show', $user) }}">
                                            {{ $user->name }}
                                        </a>
                                    </td>
                                    <td> {{ $user->email }}</td>
                                    @switch($user->director->rol)
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
                                    @if ($user->director->asignado == 1)
                                        <td class="bg-green-500 text-center">Si</td>
                                    @else
                                        <td class="bg-yellow-600 text-center">
                                            <span>No</span>
                                        </td>
                                    @endif
                                </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                    <table class="table table-hover">
                        <thead>
                          <tr>
                            <th scope="col" class="bg-gray-300">Por Correo</th>
                            <th scope="col" class="bg-gray-300 text-gray-300">.</th>
                            <th scope="col" class="bg-gray-300 text-gray-300">.</th>
                            <th scope="col" class="bg-gray-300 text-gray-300">.</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($emails as $user)
                                @if (!is_null($user->director))
                                <tr>
                                    <td>
                                        <a href="{{ route('user.show', $user) }}">
                                            {{ $user->name }}
                                        </a>
                                    </td>
                                    <td> {{ $user->email }}</td>
                                    @switch($user->director->rol)
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
                                    @if ($user->director->asignado == 1)
                                        <td class="bg-green-500 text-center">Si</td>
                                    @else
                                        <td class="bg-yellow-600 text-center">
                                            <span>No</span>
                                        </td>
                                    @endif
                                </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>