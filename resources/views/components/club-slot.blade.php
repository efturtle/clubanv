<x-slot name="header">
    <div class="flex justify-between">
        <div class="flex">
            <div class="pr-2">
                <a href="{{ route('club') }}">
                    <h6 class="py-2 px-6 bg-blue-500 rounded-full text-white">
                        Clubs
                    </h6>
                </a>
            </div>
            <div>
                <a href="{{ route('clubes.crear') }}">
                    <h6 class="py-2 px-6 bg-blue-500 rounded-full text-white">
                        Crear Club
                    </h6>
                </a>
            </div>
        </div>
        <div>
            <p>Buscar club</p>
        </div>
    </div>
</x-slot>