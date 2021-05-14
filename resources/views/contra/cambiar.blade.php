<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Cambio de Contraseña
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('store.cambio') }}" method="POST">
                        @csrf
                        <h6 class="text-indigo-900">Ingrese su nueva Contraseña</h6>
                        <div class="-mx-3 md:flex mb-6">
                            <div class="md:w-full px-3">
                              <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-password">
                                  Contraseña
                                </label>
                                <input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4 mb-3" type="password"
                                name="password" id="password"
                                required autocomplete="new-password" placeholder="******************">
                            </div>
                            <div class="md:w-full px-3">
                                <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-password">
                                    Repetir Contraseña
                                    </label>
                                    <input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4 mb-3" id="password_confirmation"
                                    type="password"
                                    name="password_confirmation" required>
                            </div>
                        </div>
                        <div class="flex justify-end"><button class="bg-blue-800 h-12 w-1/4 sm:w-1/5"> <span class="text-gray-100">Aceptar</span> </button></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>