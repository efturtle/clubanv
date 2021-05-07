<x-app-layout>
    <x-slot name="header">
        <h4 class="font-semibold text-lg text-gray-800 leading-tight">
            Asignacion de Categorias
        </h4>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if ($users->isEmpty())
                        <h5 class="text-gray-600">No hay Directores de categoria en existencia, Crear uno?</h5>
                        <a href="{{ route('director.create', 2) }}">
                            <div class="bg-green-400 rounded w-16">
                                <span class="ml-2">Crear</span>
                            </div>
                        </a>
                    @else
                        @if ($type==1)
                            <h5 class="text-red-700">Club <span class="capitalize">{{ $clubs->nombreClub }}</span></h5>    
                            <h5 class="text-red-700">Elija director de aventuras</h5>    
                            <table class="table">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">Nombre</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Escojer</th>
                                    </tr>
                                </thead>
        
                                <tbody>
                                    @foreach ($users as $aventuras)
                                        <tr>
                                            <td>{{ $aventuras->user->name }}</td>
                                            <td>{{ $aventuras->user->email }}</td>
                                            <td>
                                                <form action="{{ route('store.aventuras') }}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <input type="hidden" value="{{ $aventuras->id }}" name="aventuras" id="aventuras">
                                                    <input type="hidden" value="{{ $clubs->id }}" name="club" id="club">
                                                    <button class="bg-gray-100 w-full"><i class="fas fa-check-circle"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @endif                        

                        @if ($type==2)
                        <h5 class="text-red-700">Club <span class="capitalize">{{ $clubs->nombreClub }}</span></h5>    
                        <h5 class="text-red-700">Elija director de Conquistadores</h5>    
                            <table class="table">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">Nombre</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Escojer</th>
                                    </tr>
                                </thead>
        
                                <tbody>
                                    @foreach ($users as $conquistadores)
                                        <tr>
                                            <td>{{ $conquistadores->user->name }}</td>
                                            <td>{{ $conquistadores->user->email }}</td>
                                            <td>
                                                <form action="{{ route('store.conquistadores') }}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <input type="hidden" value="{{ $conquistadores->id }}" name="conquistadores" id="conquistadores">
                                                    <input type="hidden" value="{{ $clubs->id }}" name="club" id="club">
                                                    <button class="bg-gray-100 w-full"><i class="fas fa-check-circle"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @endif

                        @if ($type==3)
                        <h5 class="text-red-700">Club <span class="capitalize">{{ $clubs->nombreClub }}</span></h5>    
                        <h5 class="text-red-700">Elija director de Guias Mayores</h5>    
                            <table class="table">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">Nombre</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Escojer</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $guias)
                                        <tr>
                                            <td>{{ $guias->user->name }}</td>
                                            <td>{{ $guias->user->email }}</td>
                                            <td>
                                                <form action="{{ route('store.guias') }}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <input type="hidden" value="{{ $guias->id }}" name="guias" id="guias">
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