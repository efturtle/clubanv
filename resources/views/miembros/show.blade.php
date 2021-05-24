<x-app-layout>
    <x-miembros-slot/>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    {{-- Check for feedback accion message --}}
                    @if (session('message'))
                    <h6>{{ session('message') }}</h6>                  
                    @endif
                    <div class="row pb-2">
                        <div class="col-6">
                            <label>Nombre</label>
                            <div class="input-group-prepend">
                                <span class="input-group-text "><i class="fas fa-smile"></i></span>
                                <h5 class="px-3 mt-1"> {{ $miembro->nombre }}</h5>
                            </div>
                        </div>
                    </div>
                    <div class="row pb-2">
                        <div class="col-6">
                            <label>Club</label>
                            <div class="input-group-prepend">
                                <span class="input-group-text "><i class="fas fa-cube"></i></span>
                                <a href="{{ route('club.show', $miembro->club->id) }}"><h5 class="px-3 mt-1"> {{ $miembro->club->nombreClub }}</h5></a>
                            </div>
                        </div>
                        <div class="col-6">
                            <label>categoria</label>
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-caret-right"></i></span>
                                @switch($miembro->category)
                                    @case(1)
                                        <h5 class="px-3 mt-1"> Aventuras</h5>        
                                        @break
                                    @case(2)
                                        <h5 class="px-3 mt-1"> Conquistadores</h5>
                                        @break
                                    @case(3)
                                        <h5 class="px-3 mt-1"> Guias Mayores</h5>
                                        @break
                                    @default
                                        
                                @endswitch
                                
                            </div>
                        </div>
                    </div>
                    <div class="row pb-2">
                        <div class="col-6">
                            <label>Fecha de Nacimiento</label>
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                <h5 class="px-3 mt-1"> {{ $miembro->fechaNacimiento }}</h5>
                            </div>
                        </div>
                        <div class="col-6">
                            <label>Direccion</label>
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-map-marker"></i></span>
                                <h5 class="px-3 mt-1"> {{ $miembro->direccion }}</h5>
                            </div>
                        </div>
                    </div>
                    <div class="row pb-2">
                        <div class="col-6">
                            <label>Provincia / Colonia</label>
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-bullseye"></i></span>
                                <h5 class="px-3 mt-1"> {{ $miembro->provincia_colonia }}</h5>
                            </div>
                        </div>
                        <div class="col-6">
                            <label>Codigo Postal</label>
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-map-marker"></i></span>
                                <h5 class="px-3 mt-1"> {{ $miembro->codigoPostal }}</h5>
                            </div>
                        </div>
                    </div>
                    <div class="row pb-2">
                        <div class="col-6">
                            <label>Nacionalidad</label>
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-globe"></i></span>
                                <h5 class="px-3 mt-1"> {{ $miembro->nacionalidad }}</h5>
                            </div>
                        </div>
                        <div class="col-6">
                            <label>Estado</label>
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-flag"></i></span>
                                <h5 class="px-3 mt-1"> {{ $miembro->estado }}</h5>
                            </div>
                        </div>
                    </div>
                    <div class="row pb-2">
                        <div class="col-6">
                            <label>Ciudad</label>
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-building"></i></span>
                                <h5 class="px-3 mt-1"> {{ $miembro->ciudad }}</h5>
                            </div>
                        </div>
                        <div class="col-6">
                            <label>Tipo de Sangre</label>
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-heartbeat"></i></span>
                                <h5 class="px-3 mt-1"> {{ $miembro->tipoSangre }}</h5>
                            </div>
                        </div>
                    </div>
                    <div class="row pb-2">
                        <div class="col-6">
                            <label>¿Padece de Alergias?</label>
                            <div class="input-group-prepend">
                                <h5 class="px-3 mt-1"> 
                                    @switch($miembro->confirmaAlergias)
                                        @case(0)
                                            <p> No </p>
                                            @break
                                        @case(1)
                                            <p> Si </p>
                                            @break

                                        @case(2)
                                            <p> Desconoce </p>
                                            @break
                                        @default
                                    @endswitch
                                </h5>
                            </div>
                        </div>
                        <div class="col-6">
                            <label>Cual(es)</label>
                            <div class="input-group-prepend">
                                <h5 class="px-3 mt-1"> {{ $miembro->alergia }}</h5>
                            </div>
                        </div>
                    </div>
                    <div class="row pb-2">
                        <div class="col-6">
                            <label>Sexo</label>
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-circle-thin"></i></span>
                                <h5 class="px-3 mt-1"> {{ $miembro->sexo }}</h5>
                            </div>
                        </div>
                        
                    </div>
                    <div class="row pb-2">
                        {{-- <div class="col-6">
                            <label>Nombre del Padre</label>
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-user-o"></i></span>
                                <h5 class="px-3 mt-1"> {{ $miembro->nombrePadre }}  {{ $miembro->apellidosPadre }}</h5>
                            </div>
                        </div>
                        <div class="col-6">
                            <label>Nombre de la Madre</label>
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-user"></i></i></span>
                                <h5 class="px-3 mt-1"> {{ $miembro->nombreMadre }}  {{ $miembro->apellidosMadre }}</h5>
                            </div>
                        </div> --}}
                    </div>
                    <div class="row pb-2">
                        {{-- <div class="col-6">
                            <label>Contacto Padre</label>
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-address-card"></i></span>
                                <h5 class="px-3 mt-1"> {{ $miembro->contactoPadre }}</h5>
                            </div>
                        </div>
                        <div class="col-6">
                            <label>Contacto Madre</label>
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-address-card"></i></i></span>
                                <h5 class="px-3 mt-1"> {{ $miembro->contactoMadre }}</h5>
                            </div>
                        </div> --}}
                    </div>
                    <x-baja-miembro :miembroId="$miembro->id" :miembroName="$miembro->nombre"></x-baja-club>
                    <x-eliminar-miembro :miembroId="$miembro->id" :miembroName="$miembro->nombre"> </x-eliminar-club>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

    