<x-app-layout>
    <x-user-slot/>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                        <!-- Validation Errors -->
                        <x-auth-validation-errors class="mb-4" :errors="$errors" />
                        @switch($rol)
                            @case(1)
                                <h4>Director de Club</h4>
                                @break
                            @case(2)
                                <h4>Director de Categoria</h4>
                                @break
                            @default
                        @endswitch
                        <h6>Creacion de Directores</h6>
                        <form action="{{ route('new.director') }}" method="POST">
                            @csrf
                            <input type="hidden" value="{{ $rol+5 }}" name="rol" id="rol">
                            <div class="-mx-3 md:flex mb-6">
                              <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                                <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-first-name">
                                  Nombre
                                </label>
                                <input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3" id="name" type="text" name="name" :value="old('name')" required autofocus>
                                {{-- <p class="text-red text-xs italic">Please fill out this field.</p> --}}
                              </div>
                              <div class="md:w-1/2 px-3">
                                <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-last-name">
                                  Correo
                                </label>
                                <input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4" id="email" type="email" name="email" :value="old('email')" required>
                              </div>
                            </div>
                            {{-- <div class="-mx-3 md:flex mb-6">
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
                            </div> --}}
                            <div class="flex justify-end"><button class="bg-blue-800 h-12 w-1/4 sm:w-1/5"> <span class="text-gray-100">Enviar</span> </button></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
