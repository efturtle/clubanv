<x-slot name="header">
    <div class="flex justify-between">
        <div class="flex">
            <div class="pr-2">
                <a href="{{ route('club') }}">
                    <p class="py-1 px-3 bg-blue-500 rounded-full text-white">
                        Clubs
                    </p>
                </a>
            </div>
            <div class="pr-2">
                <a href="{{ route('clubes.crear') }}">
                    <p class="py-1 px-3 bg-blue-500 rounded-full text-white">
                        Crear
                    </p>
                </a>
            </div>
        </div>
        <div>
            <p>Buscar club</p>
        </div>
    </div>
</x-slot>