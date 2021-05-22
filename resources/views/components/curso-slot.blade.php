<x-slot name="header">
    <div class="flex justify-between">
        <div class="flex">
            <div class="pr-2">
                <a href="#">
                    <p class="py-1 px-3 bg-yellow-900 rounded-full text-white">
                        Cursos
                    </p>
                </a>
            </div>
            <div class="pr-2">
                <a href="{{ route('curso.create') }}">
                    <p class="py-1 px-3 bg-yellow-900 rounded-full text-white">
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