<x-app-layout> 
    <x-distrito-slot/>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <table class="table table-striped">
                        <thead><tr>
                            <th scope="col">Nombre</th>  
                            <th scope="col">Ciudad</th>
                            <th scope="col">Estado</th>
                            <th scope="col">Pastor</th>
                            <th scope="col">Coordinador</th>
                            <th scope="col">Editar</th>
                        </tr></thead>
            
                        <tbody> 
                            @foreach ($distritos as $distrito)
                                <tr>
                                    <td class="fw-bold">  
                                        <a href="{{ route('distrito.show', $distrito->id) }}">{{ $distrito->nombre }}</a>
                                    </td>
                                    <td class="fw-bold"> {{ $distrito->ciudad }}</td>
                                    <td class="fw-bold"> {{ $distrito->estado }} </td>
                                    @if ($distrito->pastor_id == null)
                                        <td class="fw-bold">                                        
                                            <a href="/asignar/pastor/{{ $distrito->id }}">
                                                <span class="bg-green-600 center rounded w-1/2 text-white">Asignar</span>
                                            </a>
                                        </td>    
                                    @else
                                        <td class="fw-bold">hi</td>
                                    @endif
                                    @if ($distrito->coordinador_id == null)
                                        <td class="fw-bold">
                                            <a href="/asignar/coordinador/{{ $distrito->id }}">
                                                <span class="bg-green-600 center rounded w-1/2 text-white">Asignar</span>
                                            </a>
                                        </td>    
                                    @else
                                        <td class="fw-bold">hi</td>
                                    @endif
            
                                    
                                    <td>
                                        <a href="{{ route('distrito.edit', $distrito->id) }}">
                                            <button class="btn btn-outline-warning" ><i class="fas fa-pen-square"></i></button>
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