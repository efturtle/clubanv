<x-app-layout>
    <x-slot name="header">
        <h4 class="font-semibold text-lg text-gray-800 leading-tight">
            asignacion
        </h4>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    {{ $clubs->nombreClub }}
                    {{-- 
                    // ya tengo el al club el usuario va a ser asignado
                    // mostrar los pastores
                    // en una tabla y que elijan el usuario que se asignara a ese club
                    --}}
                    @foreach ($pastors as $pastor)
                        @if ()
                            <p>hi</p>
                        @endif
                    @endforeach
                    <table class="">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Email</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>



                </div>
            </div>
        </div>
    </div>
</x-app-layout>