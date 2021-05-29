<x-app-layout>
    <x-club-slot/>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if (session('message'))
                        <p class="text-success">{{ session('message') }}</p>
                    @endif
                    <table class="table table-striped table-sm">
                        <thead><tr>
                            <th scope="col">Nombre del Club</th>
                            <th scope="col">Director</th>
                            <th scope="col">Distrito</th>
                            <th scope="col">Pastor</th>
                        </tr></thead>
                        <tbody> 
                            @foreach ($clubs as $club)
                                <tr>
                                    {{-- Nombre del Club --}}
                                    <td>  
                                        <a href="{{ route('club.show', $club) }}">{{ $club->nombreClub }}</a>
                                    </td>

                                    {{-- Director --}}
                                    @if (is_null($club->director))
                                        <td>
                                            <a href="{{ route('asignar.director', $club) }}">
                                                <button class="bg-green-400 center rounded w-full"><span class="text-gray-900">Asignar</span></button>
                                            </a>
                                        </td>
                                    @else
                                        <td class="bg-blue-200 rounded"> 
                                            <a href="{{ route('user.show', $club->director_id) }}">{{ $club->director->name }}</a>
                                        </td>
                                    @endif
                                    
                                    {{-- Distrito --}}
                                    <td> {{ $club->distrito->nombre }} </td>


                                    {{-- Pastor --}}
                                    @if (is_null($club->pastor))
                                        <td>
                                            <a href="{{ route('asignar.pastor', $club) }}">
                                                <button class="bg-green-400 center rounded w-full"><span class="text-gray-900">Asignar</span></button>
                                            </a>
                                        </td>
                                    @else
                                        <td class="bg-blue-200 rounded"> 
                                            <a href="{{ route('user.show', $club->pastor_id) }}">
                                                <span>{{ $club->pastor->name }}</span>
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
