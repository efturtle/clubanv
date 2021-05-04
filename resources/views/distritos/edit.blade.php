<x-app-layout>
    <x-distrito-slot/>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">                   
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />
                    <form action="{{ route('distrito.update', $distrito) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="md:w-1/2 mb-6 md:mb-0">
                            <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-first-name">
                            Nombre del Distrito
                            </label>
                            <input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3" id="nombre" type="text" name="nombre" value="{{ $distrito->nombre }}" required autofocus>
                            {{-- <p class="text-red text-xs italic">Please fill out this field.</p> --}}
                        </div>
                        <div class="md:w-1/2 mb-6 md:mb-0">
                            <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-first-name">
                            Estado del Distrito
                            </label>
                            <div class="input-group-prepend">
                                <select class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" name="estado" id="estado" required> 
                                    <option value="{{ $distrito->estado }}" selected>{{ $distrito->estado }}</option>
                                    <option value="Aguascalientes">Aguascalientes</option>
                                    <option value="Baja California">Baja California</option>
                                    <option value="Baja California Sur">Baja California Sur</option>
                                    <option value="Campeche">Campeche</option>
                                    <option value="Chiapas">Chiapas</option>
                                    <option value="Chihuahua">Chihuahua</option>
                                    <option value="Ciudad de México">Ciudad de México</option>
                                    <option value="Coahuila">Coahuila</option>
                                    <option value="Colima">Colima</option>
                                    <option value="Durango">Durango</option>
                                    <option value="Estado de México">Estado de México</option>
                                    <option value="Guanajuato">Guanajuato</option>
                                    <option value="Guerrero">Guerrero</option>
                                    <option value="Hidalgo">Hidalgo</option>
                                    <option value="Jalisco">Jalisco</option>
                                    <option value="Michoacán">Michoacán</option>
                                    <option value="Morelos">Morelos</option>
                                    <option value="Nayarit">Nayarit</option>
                                    <option value="Nuevo León">Nuevo León</option>
                                    <option value="Oaxaca">Oaxaca</option>
                                    <option value="Puebla">Puebla</option>
                                    <option value="Querétaro">Querétaro</option>
                                    <option value="Quintana Roo">Quintana Roo</option>
                                    <option value="San Luis Potosí">San Luis Potosí</option>
                                    <option value="Sinaloa">Sinaloa</option>
                                    <option value="Sonora">Sonora</option>
                                    <option value="Tabasco">Tabasco</option>
                                    <option value="Tamaulipas">Tamaulipas</option>
                                    <option value="Tlaxcala">Tlaxcala</option>
                                    <option value="Veracruz">Veracruz</option>
                                    <option value="Yucatán">Yucatán</option>
                                    <option value="Zacatecas">Zacatecas</option>
                                </select>
                            </div>
                        </div>
                        <div class="md:w-1/2 mb-6 md:mb-0">
                            <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-first-name">
                            Ciudad del Distrito
                            </label>
                            <input class="appearance-none block w-full bg-grey-lighter text-grey-darker border rounded py-3 px-4 mb-3" id="ciudad" type="text" name="ciudad" value="{{ $distrito->ciudad }}" required>
                            {{-- <p class="text-red text-xs italic">Please fill out this field.</p> --}}
                        </div>
                        <div class="flex justify-end"><button class="bg-blue-800 h-12 w-1/4 sm:w-1/5"> <span class="text-gray-100">Enviar</span> </button></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>