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
            <form action="{{ route('busqueda.club') }}" method="POST">
                @csrf
                <div class="flex">
                    <input type="text" name="busqueda" id="busqueda" class="rounded appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter">
                    <button class="bg-blue-500 rounded-full text-white w-14 ml-1">Ir</button>
                </div>
            </form>
            
        </div>
    </div>
</x-slot>