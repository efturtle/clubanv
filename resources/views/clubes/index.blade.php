<x-app-layout>
    <x-club-slot/>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if (session('message'))
                        <p class="text-success">{{ session('message') }}</p>
                    @endif
                    @if ($clublist->isEmpty())
                        <p>Al parecer no hay clubs actualmente</p>
                        <br>
                        <div class="pr-2">
                            <a href="{{ route('clubes.crear') }}">
                                <p class="py-1 px-3 bg-blue-500 rounded-full w-1/5 text-white">
                                    Crear
                                </p>
                            </a>
                        </div>
                    @else    
                        <table class="table table-striped table-sm">
                            <thead><tr>
                                <th scope="col">Nombre del Club</th>
                                <th scope="col">Director</th>
                                <th scope="col">Distrito</th>
                                <th scope="col">Pastor</th>
                            </tr></thead>
                            <tbody> 
                                @foreach ($clublist as $clubs)
                                    <tr>
                                        {{-- Nombre del Club --}}
                                        <td>  
                                            <a href="{{ route('club.show', $clubs) }}">{{ $clubs->nombreClub }}</a>
                                        </td>

                                        {{-- Director --}}
                                        @if (is_null($clubs->director))
                                            <td>
                                                <a href="{{ route('asignar.director', $clubs) }}">
                                                    <button class="bg-green-400 center rounded w-full"><span class="text-gray-900">Asignar</span></button>
                                                </a>
                                            </td>
                                        @else
                                            <td> {{ $clubs->director->name }} </td>
                                        @endif
                                        
                                        {{-- Distrito --}}
                                        <td> {{ $clubs->distrito->nombre }} </td>


                                        {{-- Pastor --}}
                                        @if (is_null($clubs->pastor))
                                            <td>
                                                <a href="{{ route('asignar.pastor', $clubs) }}">
                                                    <button class="bg-green-400 center rounded w-full"><span class="text-gray-900">Asignar</span></button>
                                                </a>
                                            </td>
                                        @else
                                            <td> {{ $clubs->pastor->name }} </td>
                                        @endif
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
