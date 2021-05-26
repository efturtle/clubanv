<x-slot name="header">
    <nav>
        <div class="flex justify-between">
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
            <div>
                <form action="{{ route('busqueda.miembro') }}" method="POST">
                    @csrf
                    <div class="flex">
                        <input type="text" name="busqueda" id="busqueda" placeholder="Buscar" class="rounded appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter">
                        <button class="bg-indigo-500 text-white rounded-full w-14 ml-1">Ir</button>
                    </div>
                </form>
            </div>
        </div>
    </nav>
</x-slot>