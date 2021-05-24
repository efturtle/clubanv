<x-slot name="header">
    <nav>
        <div class="flex">
            <a href="{{ route('miembros.index') }}" class="mr-3">
                <p class="py-1 px-3 bg-indigo-500 rounded-full text-white">
                    Miembros
                </p>
            </a>
            <a href="{{ route('miembro.create') }}" class="mr-3">
                <p class="py-1 px-3 bg-indigo-500 rounded-full text-white">
                    Crear
                </p>
            </a>
            <a href="#">
                <p class="py-1 px-3 bg-indigo-500 rounded-full text-white">
                    Cursos
                </p>
            </a>
        </div>
    </nav>
</x-slot>