<x-app-layout> 
    <x-distrito-slot/>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <table class="table table-striped table-sm">
                        <thead><tr>
                            <th scope="col">Nombre</th>
                            <th scope="col">Ciudad</th>
                            <th scope="col">Estado</th>
                            <th scope="col">Pastor</th>
                            <th scope="col">Coordinador</th>
                        </tr></thead>
                        <tbody>
                            @foreach ($distritos as $distrito)
                                <tr>
                                    <td>
                                        <a href="{{ route('distrito.show', $distrito->id) }}">{{ $distrito->nombre }}</a>
                                    </td>
                                    <td> {{ $distrito->ciudad }}</td>
                                    <td> {{ $distrito->estado }} </td>
                                    @if ($distrito->pastor_id == null)
                                        <td>
                                            <a href="{{ route('asignar.distrito', ['type' => 1, 'distrito' => $distrito]) }}">
                                                <span class="bg-green-600 center rounded w-1/2 text-white">Asignar</span>
                                            </a>
                                        </td>
                                    @else
                                        <td>
                                            <a href="{{ route('user.show', $distrito->pastor) }}">
                                                {{ $distrito->pastor->name }}
                                            </a>
                                        </td>
                                    @endif
                                    @if ($distrito->coordinador_id == null)
                                        <td>
                                            <a href="{{ route('asignar.distrito', ['type' => 2, 'distrito' => $distrito]) }}">
                                                <span class="bg-green-600 center rounded w-1/2 text-white">Asignar</span>
                                            </a>
                                        </td>    
                                    @else
                                        <td>
                                            <a href="{{ route('user.show', $distrito->coordinador) }}">
                                                {{ $distrito->coordinador->name }}
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