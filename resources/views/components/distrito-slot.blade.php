<x-slot name="header">
    <div class="flex justify-between">
        <div class="flex">
            <div class="pr-2">
                <a href="{{ route('distritos.index') }}">
                    <p class="py-1 px-3 lg:text-lg bg-pink-700 rounded-full text-white">
                        Distritos
                    </p>
                </a>
            </div>
            <div>
                <a href="{{ route('distritos.create') }}">
                    <p class="py-1 px-3 lg:text-base bg-pink-700 rounded-full text-white">
                        Nuevo
                    </p>
                </a>
            </div>
        </div>
        <div>
            <p>Buscar Distrito</p>
        </div>
    </div>
</x-slot>