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
            {{-- <div>
                <x-dropdown>
                    <x-slot name="trigger">
                        <button class="flex items-center py-1 px-3 bg-blue-500 rounded-full text-white focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                            <div>Asignar</div>
                            <div class="ml-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>
                    <x-slot name="content">
                        <a href="{{ route('asignar.pastor', $clubs) }}">
                            <span class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out">
                                Director
                            </span>
                        </a>
                        <a href="{{ route('directive.create', 4) }}">
                            <span class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out">
                                Pastor
                            </span>
                        </a>
                        <a href="{{ route('directive.create', 3) }}">
                            <span class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out">
                                Encargado
                            </span>
                        </a>
                    </x-slot>
                </x-dropdown>
            </div> --}}
        </div>
        <div>
            <p>Buscar club</p>
        </div>
    </div>
</x-slot>