<x-app-layout>
    <x-slot name="header">
        <h4 class="font-semibold text-lg text-gray-800 leading-tight">
            Asignacion de cargos de Distrito
        </h4>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if ($users->isEmpty())
                        @if ($type==1)
                            <h5 class="text-gray-600">No hay pastores en existencia, Crear uno?</h5>
                            <a href="{{ route('directive.create', 4) }}">
                                <div class="bg-green-400 rounded w-16">
                                    <span class="ml-2">Crear</span>
                                </div>
                            </a>
                        @else
                            <h5 class="text-gray-600">No hay coordinadores en existencia, Crear uno?</h5>
                            <a href="{{ route('directive.create', 5) }}">
                                <div class="bg-green-400 rounded w-16">
                                    <span class="ml-2">Crear</span>
                                </div>
                            </a>
                        @endif
                    @else
                        @if ($type==1)
                            <h5 class="text-red-700">Distrito <span class="capitalize">{{ $distrito->nombre }}</span></h5>
                            <h5 class="text-red-700">Elija un Pastor</h5>    
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
                                                <form action="{{ route('store.pastor.distrito') }}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <input type="hidden" value="{{ $pastor->id }}" name="pastor" id="pastor">
                                                    <input type="hidden" value="{{ $distrito->id }}" name="club" id="club">
                                                    <button class="bg-gray-100 w-full"><i class="fas fa-check-circle"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @endif                        
                        @if ($type==2)
                            <h5 class="text-red-700">Distrito <span class="capitalize">{{ $distrito->nombre }}</span></h5>    
                            <h5 class="text-red-700">Elija un Coordinador</h5>    
                            <table class="table">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">Nombre</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Escojer</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $coordinador)
                                        <tr>
                                            <td>{{ $coordinador->user->name }}</td>
                                            <td>{{ $coordinador->user->email }}</td>
                                            <td>
                                                <form action="{{ route('store.coordinador.distrito') }}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <input type="hidden" value="{{ $coordinador->id }}" name="coordinador" id="coordinador">
                                                    <input type="hidden" value="{{ $distrito->id }}" name="club" id="club">
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