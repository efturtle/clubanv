<x-slot name="header">
    <nav x-data="{ opened: false }" class="bg-white border-b border-gray-100">
        <!-- Primary Navigation Menu -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex justiy-around items-center">
                    <div class="pr-2 ">
                        <a href="{{ route('user.index') }}">
                            <p class="py-1 px-3 lg:text-lg bg-green-500 rounded-full text-white">
                                Lista de Usuarios
                            </p>
                        </a>
                    </div>
                    <div class="pr-2 ">
                        <a href="{{ route('directors.index') }}">
                            <p class="py-1 px-3 lg:text-lg bg-green-500 rounded-full text-white">
                                Directores de Categoria
                            </p>
                        </a>
                    </div>
                    <div class="hidden sm:flex pr-2 pb-3">
                        @if (Auth::user()->directorinfo->rol < 4) 
                            <x-dropdown>
                                <x-slot name="trigger">
                                    <button class="flex items-center py-1 px-3 lg:text-lg font-medium bg-green-500 rounded-full text-white focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
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
                        @endif
                    </div>

                    <div class="hidden sm:flex pr-2 pb-3">
                        <x-dropdown>
                            <x-slot name="trigger">
                                <button class="flex items-center py-1 px-3 lg:text-lg font-medium bg-green-500 rounded-full text-white focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
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

                <div class="hidden md:flex">
                    <div>
                        <input type="search" class="bg-purple-white shadow rounded border-0 p-2" placeholder="Busqueda">
                    </div>
                    <div class="pl-3">
                        <button class="hover:bg-purple-500 px-3 py-2">
                            <svg version="1.1" class="h-4 text-dark" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                viewBox="0 0 52.966 52.966" style="enable-background:new 0 0 52.966 52.966;" xml:space="preserve">
                                <path d="M51.704,51.273L36.845,35.82c3.79-3.801,6.138-9.041,6.138-14.82c0-11.58-9.42-21-21-21s-21,9.42-21,21s9.42,21,21,21
                                c5.083,0,9.748-1.817,13.384-4.832l14.895,15.491c0.196,0.205,0.458,0.307,0.721,0.307c0.25,0,0.499-0.093,0.693-0.279
                                C52.074,52.304,52.086,51.671,51.704,51.273z M21.983,40c-10.477,0-19-8.523-19-19s8.523-19,19-19s19,8.523,19,19
                                S32.459,40,21.983,40z"/>
                            </svg>
                        </button>
                    </div>
                </div>
                    
                <!-- Hamburger -->
                <div class="mr-2 flex items-center sm:hidden">
                    <button @click="opened = ! opened" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                        <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path :class="{'hidden': opened, 'inline-flex': ! opened }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            <path :class="{'hidden': ! opened, 'inline-flex': opened }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    
        <!-- Responsive Navigation Menu -->
        <div :class="{'block': opened, 'hidden': ! opened}" class="hidden sm:hidden">
            <div class="pt-2 pb-3 space-y-1">
                <x-responsive-nav-link>
                    <x-dropdown>
                        <x-slot name="trigger">
                            <button class="flex py-1 px-3 text-sm font-medium bg-green-500 rounded-full text-white focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
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

                </x-responsive-nav-link>
                <x-responsive-nav-link>
                    <x-dropdown>
                        <x-slot name="trigger">
                            <button class="flex py-1 px-3 text-sm font-medium bg-green-500 rounded-full text-white focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
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
                </x-responsive-nav-link>
                <x-responsive-nav-link>
                    <form action="#">
                        <div class="flex items-center mr-6 my-2">
                            <div><input type="search" class="bg-purple-white shadow rounded border-0 p-2" placeholder="Busqueda"></div>
                            <div class="pl-3"><button class="hover:bg-purple-500 px-3 py-2">
                                <svg version="1.1" class="h-4 text-dark" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                viewBox="0 0 52.966 52.966" style="enable-background:new 0 0 52.966 52.966;" xml:space="preserve">
                                    <path d="M51.704,51.273L36.845,35.82c3.79-3.801,6.138-9.041,6.138-14.82c0-11.58-9.42-21-21-21s-21,9.42-21,21s9.42,21,21,21
                                    c5.083,0,9.748-1.817,13.384-4.832l14.895,15.491c0.196,0.205,0.458,0.307,0.721,0.307c0.25,0,0.499-0.093,0.693-0.279
                                    C52.074,52.304,52.086,51.671,51.704,51.273z M21.983,40c-10.477,0-19-8.523-19-19s8.523-19,19-19s19,8.523,19,19
                                    S32.459,40,21.983,40z"/>
                                </svg>
                            </button></div>
                        </div>
                        
                    </form>
                </x-responsive-nav-link>
            </div>
        </div>
    </nav>
</x-slot>