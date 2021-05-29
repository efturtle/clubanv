<x-app-layout>
    <x-curso-slot/>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if (session('message'))
                        <p class="text-success">{{ session('message') }}</p>
                    @endif

                    Cursos bajo mantenimiento
                    {{-- <form class="mt-10" method="POST" action="{{ route('curso.store') }}">
                        @csrf
                        
                        <label for="email" class="block text-xs font-semibold text-gray-600 uppercase">E-mail</label>
                        <input id="email" type="text" name="email" placeholder="e-mail address" autocomplete="email"
                            class="block w-full py-3 px-1 mt-2 
                            text-gray-800 appearance-none 
                            border-b-2 border-gray-100
                            focus:text-gray-500 focus:outline-none focus:border-gray-200"
                            required />
                        
                        <label for="email" class="block text-xs font-semibold text-gray-600 uppercase">E-mail</label>
                        <input id="email" type="text" name="email" placeholder="e-mail address" autocomplete="email"
                            class="block w-full py-3 px-1 mt-2 
                            text-gray-800 appearance-none 
                            border-b-2 border-gray-100
                            focus:text-gray-500 focus:outline-none focus:border-gray-200"
                            required />

                        
                        <button type="submit"
                            class="w-1/2 py-3 mt-10 bg-gray-800 rounded-sm
                            font-medium text-white uppercase
                            focus:outline-none hover:bg-gray-700 hover:shadow-none">
                            Enviar
                        </button>

                    </form> --}}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
