<div class="flex justify-end">
    <x-dropdown>
        <x-slot name="trigger">
            <button class="flex items-center rounded-full focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                <div>Filtros</div>
                <div class="ml-1">
                    <i class="fas fa-filter"></i>
                </div>
            </button>
        </x-slot>
        <x-slot name="content">
            <a href="#">
                <span class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out">
                    Categoria Aventureros
                </span>
            </a>
            <a href="#">
                <span class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out">
                    Categoria Conquistadores
                </span>
            </a>
            <a href="#">
                <span class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out">
                    Categoria Guias Mayores
                </span>
            </a>
            <a href="#">
                <span class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out">
                    Inactivos
                </span>
            </a>
        </x-slot>
    </x-dropdown>
</div>