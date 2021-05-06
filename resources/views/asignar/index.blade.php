<x-app-layout>
    <x-slot name="header">
        <h4 class="font-semibold text-lg text-gray-800 leading-tight">
            Asignacion
        </h4>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if ($type==1)
                        @if ($users->isEmpty())
                            <h5 class="text-gray-600">No hay pastores en existencia, Crear uno?</h5>
                            <a href="{{ route('directive.create', 4) }}">
                                <div class="bg-green-400 rounded w-16">
                                    <span class="ml-2">Crear</span>
                                </div>
                            </a>
                        @else
                            <h5 class="text-red-700">Elija el Pastor para el club <span class="capitalize">{{ $clubs->nombreClub }}</span></h5>    
                            <table class="table">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">Nombre</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Escojer</th>
                                    </tr>
                                </thead>
        
                                <tbody>
                                    @foreach ($users as $pastor)
                                        <tr>
                                            <td>{{ $pastor->user->name }}</td>
                                            <td>{{ $pastor->user->email }}</td>
                                            <td>
                                                <form action="{{ route('store.pastor') }}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <input type="hidden" value="{{ $pastor->id }}" name="pastor" id="pastor">
                                                    <input type="hidden" value="{{ $clubs->id }}" name="club" id="club">
                                                    <button class="bg-gray-100 w-full"><i class="fas fa-check-circle"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @endif
                        
                    @endif
                    @if ($type==2)
                        @if ($users->isEmpty())
                            <h5 class="text-gray-600">No hay Directores en existencia, Crear uno?</h5>
                            <a href="{{ route('director.create', 1) }}">
                                <div class="bg-green-400 rounded w-16">
                                    <span class="ml-2">Crear</span>
                                </div>
                            </a>
                        @else    
                            <h5 class="text-red-700">Elija el Director para el club <span class="capitalize">{{ $clubs->nombreClub }}</span></h5>    
                            <table class="table">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">Nombre</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Escojer</th>
                                    </tr>
                                </thead>
        
                                <tbody>
                                    @foreach ($users as $director)
                                        <tr>
                                            <td>{{ $director->user->name }}</td>
                                            <td>{{ $director->user->email }}</td>
                                            <td>
                                                <form action="{{ route('store.director') }}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <input type="hidden" value="{{ $director->id }}" name="director" id="director">
                                                    <input type="hidden" value="{{ $clubs->id }}" name="club" id="club">
                                                    <button class="bg-gray-100 w-full"><i class="fas fa-check-circle"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @endif

                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>