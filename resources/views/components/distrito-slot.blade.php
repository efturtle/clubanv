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
            <form action="{{ route('busqueda.distrito') }}" method="POST">
                @csrf
                <div class="flex">
                    <input type="text" name="busqueda" id="busqueda" placeholder="Buscar" class="rounded appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter">
                    <button class="bg-pink-700 text-white rounded-full w-14 ml-1">Ir</button>
                </div>
            </form>
        </div>
    </div>
</x-slot>