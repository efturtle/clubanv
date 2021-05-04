<x-slot name="header">
    <div class="flex justify-between">
        <div class="flex">
            <div class="pr-2">
                <a href="{{ route('distritos.index') }}">
                    <h6 class="py-2 px-6 bg-pink-700 rounded-full text-white">
                        Distritos
                    </h6>
                </a>
            </div>
            <div>
                <a href="{{ route('distritos.create') }}">
                    <h6 class="py-2 px-6 bg-pink-700 rounded-full text-white">
                        Crear Distrito
                    </h6>
                </a>
            </div>
        </div>
        <div>
            <p>Buscar Distrito</p>
        </div>
    </div>
</x-slot>