<x-slot name="header">
    <div class="flex justify-between">
        <div class="flex">
            <div class="pr-2">
                <a href="{{ route('user.index') }}">
                    <h6 class="py-2 px-6 bg-green-500 rounded-full text-white">
                        Lista de Usuarios
                    </h6>
                </a>
            </div>
            <div class="pr-2">
                <a href="{{ route('directors.index') }}">
                    <h6 class="py-2 px-6 bg-green-500 rounded-full text-white">
                        Directores de Categoria
                    </h6>
                </a>
            </div>
            <div>
                <div class="hidden sm:flex sm:items-center">
                    <x-dropdown>
                        <x-slot name="trigger">
                            <button class="flex items-center py-2 px-6 text-sm font-medium bg-green-500 rounded-full text-white focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                                <div>Crear Director</div>
                                <div class="ml-1">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>
                        <x-slot name="content">
                            <a href="{{ route('director.create', 1) }}">
                                <span class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out">
                                    Director de Club
                                </span> 
                            </a>
                            <a href="{{ route('director.create', 2) }}">
                                <span class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out">
                                    Director de Categoria
                                </span>
                            </a>
                        </x-slot>
                    </x-dropdown>
                </div>
            </div>
            @if (Auth::user()->directorinfo->rol < 4) 
                <div class="ml-2">
                    <div class="hidden sm:flex sm:items-center">
                        <x-dropdown>
                            <x-slot name="trigger">
                                <button class="flex items-center py-2 px-6 text-sm font-medium bg-green-500 rounded-full text-white focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                                    <div>Crear Directivo</div>
                                    <div class="ml-1">
                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </button>
                            </x-slot>
        
                            <x-slot name="content">
                                <a href="{{ route('directive.create', 1) }}">
                                    <span class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out">
                                        Director
                                    </span>
                                </a>
                                <a href="{{ route('directive.create', 2) }}">
                                    <span class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out">
                                        Secretaria
                                    </span>
                                </a>
                                <a href="{{ route('directive.create', 3) }}">
                                    <span class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out">
                                        Encargado
                                    </span>
                                </a>
                                <a href="{{ route('directive.create', 4) }}">
                                    <span class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out">
                                        Pastor
                                    </span>
                                </a>
                                <a href="{{ route('directive.create', 5) }}">
                                    <span class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out">
                                        Coordinador
                                    </span>
                                </a>
                            </x-slot>
                        </x-dropdown>
                    </div>
                </div>
            @endif
        </div>
        <div>
            <p>Buscar Usuario</p>
        </div>
    </div>
</x-slot>