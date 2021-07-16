<x-slot name="header">
    <div class="flex">
        <div class="mr-3 rounded-full bg-red-400 text-white px-3 py-1">
            <a href="{{ route('posts.index') }}" class="text-white">
                Publicaciones
            </a>
        </div>
        <div class="mr-3 rounded-full bg-red-400 px-3 py-1">
            <a href="{{ route('posts.create') }}" class="text-white">
                Crear
            </a>
        </div>
    </div>
</x-slot>