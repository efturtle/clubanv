<x-app-layout>
<x-estadistica-slot/>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <div class="grid grid-cols-2 gap-4 md:grid-cols-3">
                    <div class="box-border h-60 w-70 p-3 border-4 bg-blue-600">
                        <div><p class="text-white">Aventureros</p></div> 
                        <div class="flex justify-end">
                            <i class="far fa-chart-bar fa-5x"></i>
                        </div> 
                        <div><p class="text-white">Activos: {{ $aventureros }}</p></div> 
                    </div>
                    <div class="box-border h-60 w-70 p-3 border-4 bg-red-600">
                        <div><p class="text-white">Conquistadores</p></div> 
                        <div class="flex justify-end">
                            <i class="fas fa-users fa-5x"></i>
                        </div> 
                        <div><p class="text-white">Activos: {{ $conquistadores }}</p></div> 
                    </div>
                    <div class="box-border h-60 w-70 p-3 border-4 bg-green-600">
                        <div><p class="text-white">Guias Mayores</p></div> 
                        <div class="flex justify-end">
                            <i class="fas fa-users fa-5x"></i>
                        </div> 
                        <div><p class="text-white">Activos: {{ $guias }}</p></div> 
                    </div>
                    <div class="box-border h-60 w-70 p-3 border-4 bg-gray-800">
                        <div><p class="text-white">Pastores</p></div> 
                        <div class="flex justify-end">
                            <span class="text-gray-200"><i class="fas fa-users fa-5x"></i></span> 
                        </div> 
                        <div><p class="text-white">Activos: {{ $pastores }}</p></div> 
                    </div>
                    <div class="box-border h-60 w-70 p-3 border-4 bg-yellow-600">
                        <div><p class="text-white">Bautizados</p></div> 
                        <div class="flex justify-end">
                            <span class="text-gray-200"><i class="fas fa-users fa-5x"></i></span> 
                        </div> 
                        <div><p class="text-white">Activos: {{ $bautizados }}</p></div> 
                        {{-- <div><p class="text-white">87.10%</p></div>  --}}
                    </div>
                </div>
                

            </div>
        </div>
    </div>
</div>


</x-app-layout>