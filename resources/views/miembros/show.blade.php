@include('nav')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <section class="content">
            <div class="card">
                <div class="card-header">
                    @if (session('message'))
                        <p class="text-success">{{ session('message') }}</p>
                    @endif
                </div>
                <div class="card-body">
                    <div class="row pb-2">
                        <div class="col-6">
                            <label>Nombre</label>
                            <div class="input-group-prepend">
                                <span class="input-group-text "><i class="fas fa-smile"></i></span>
                                <h5 class="px-3 mt-1"> {{ $miembros->nombre }}</h5>
                            </div>
                        </div>
                    </div>
                    <div class="row pb-2">
                        <div class="col-6">
                            <label>Club</label>
                            <div class="input-group-prepend">
                                <span class="input-group-text "><i class="fas fa-cube"></i></span>
                                <h5 class="px-3 mt-1"> {{ $miembros->club }}</h5>
                            </div>
                        </div>
                        <div class="col-6">
                            <label>categoria</label>
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-caret-right"></i></span>
                                @switch($miembros->categoria)
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
                                <h5 class="px-3 mt-1"> {{ $miembros->fechaNacimiento }}</h5>
                            </div>
                        </div>
                        <div class="col-6">
                            <label>Direccion</label>
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-map-marker"></i></span>
                                <h5 class="px-3 mt-1"> {{ $miembros->direccion }}</h5>
                            </div>
                        </div>
                    </div>
                    <div class="row pb-2">
                        <div class="col-6">
                            <label>Provincia / Colonia</label>
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-bullseye"></i></span>
                                <h5 class="px-3 mt-1"> {{ $miembros->provincia_colonia }}</h5>
                            </div>
                        </div>
                        <div class="col-6">
                            <label>Codigo Postal</label>
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-map-marker"></i></span>
                                <h5 class="px-3 mt-1"> {{ $miembros->codigoPostal }}</h5>
                            </div>
                        </div>
                    </div>
                    <div class="row pb-2">
                        <div class="col-6">
                            <label>Nacionalidad</label>
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-globe"></i></span>
                                <h5 class="px-3 mt-1"> {{ $miembros->nacionalidad }}</h5>
                            </div>
                        </div>
                        <div class="col-6">
                            <label>Estado</label>
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-flag"></i></span>
                                <h5 class="px-3 mt-1"> {{ $miembros->estado }}</h5>
                            </div>
                        </div>
                    </div>
                    <div class="row pb-2">
                        <div class="col-6">
                            <label>Ciudad</label>
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-building"></i></span>
                                <h5 class="px-3 mt-1"> {{ $miembros->ciudad }}</h5>
                            </div>
                        </div>
                        <div class="col-6">
                            <label>Tipo de Sangre</label>
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-heartbeat"></i></span>
                                <h5 class="px-3 mt-1"> {{ $miembros->tipoSangre }}</h5>
                            </div>
                        </div>
                    </div>
                    <div class="row pb-2">
                        <div class="col-6">
                            <label>¿Padece de Alergias?</label>
                            <div class="input-group-prepend">
                                <h5 class="px-3 mt-1"> 
                                    @switch($miembros->confirmaAlergias)
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
                                <h5 class="px-3 mt-1"> {{ $miembros->alergia }}</h5>
                            </div>
                        </div>
                    </div>
                    <div class="row pb-2">
                        <div class="col-6">
                            <label>Sexo</label>
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-circle-thin"></i></span>
                                <h5 class="px-3 mt-1"> {{ $miembros->sexo }}</h5>
                            </div>
                        </div>
                        
                    </div>
                    <div class="row pb-2">
                        {{-- <div class="col-6">
                            <label>Nombre del Padre</label>
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-user-o"></i></span>
                                <h5 class="px-3 mt-1"> {{ $miembros->nombrePadre }}  {{ $miembros->apellidosPadre }}</h5>
                            </div>
                        </div>
                        <div class="col-6">
                            <label>Nombre de la Madre</label>
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-user"></i></i></span>
                                <h5 class="px-3 mt-1"> {{ $miembros->nombreMadre }}  {{ $miembros->apellidosMadre }}</h5>
                            </div>
                        </div> --}}
                    </div>
                    <div class="row pb-2">
                        {{-- <div class="col-6">
                            <label>Contacto Padre</label>
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-address-card"></i></span>
                                <h5 class="px-3 mt-1"> {{ $miembros->contactoPadre }}</h5>
                            </div>
                        </div>
                        <div class="col-6">
                            <label>Contacto Madre</label>
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-address-card"></i></i></span>
                                <h5 class="px-3 mt-1"> {{ $miembros->contactoMadre }}</h5>
                            </div>
                        </div> --}}
                    </div>
                </div>
                <div class="card-footer">
                    <x-baja-miembro :miembroId="$miembros->id" :miembroName="$miembros->nombre"></x-baja-club>
                    <x-eliminar-miembro :miembroId="$miembros->id" :miembroName="$miembros->nombre"> </x-eliminar-club>
                </div>
            </div>
    </section>
    </section>
</div>
@include('footer')
    