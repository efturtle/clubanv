<x-app-layout>
    <x-club-slot/>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if (session('message'))
                        <h3 class="text-success">{{ session('message') }}</h3>
                    @endif
                    <div class="row pb-2">
                        <div class="col-6">
                            <h6 class="text-bold">Nombre del Distrito</h6>
                            <div class="input-group-prepend">
                                <span class="input-group-text "><i class="fas fa-file-alt"></i></span>
                                <h5 class="px-3 mt-1">{{ $clubs->distrito->nombre }}</h5>
                            </div>
                        </div>
                        <div class="col-6">
                            <h6 class="text-bold">Nombre del club</h6>
                            <div class="input-group-prepend">
                                <span class="input-group-text "><i class="fas fa-file-alt"></i></span>
                                <h5 class="px-3 mt-1">{{ $clubs->nombreClub }}</h5>
                            </div>
                        </div>
                        
                    </div>
                    <div class="row pb-2">
                        <div class="col-6">
                            <h6 class="text-bold">Iglesia</h6>
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-church"></i></span>
                                <h5 class="px-3 mt-1"> {{ $clubs->iglesia }}</h5>
                            </div>
                        </div>
                        <div class="col-6">
                            <h6 class="text-bold">Director</h6>
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user-shield"></i></span>
                                @if ($clubs->director == null)
                                    <h5 class="px-3 mt-1">
                                        No asignado
                                    </h5>
                                @else
                                    <h5 class="px-3 mt-1"> {{ $clubs->director->name }}</h5>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row pb-2">
                        <div class="col-6">
                            <h6 class="text-bold">Subdirector</h6>
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-user-circle"></i></span>
                                <h5 class="px-3 mt-1"> {{ $clubs->subdirector }}</h5>
                            </div>
                        </div>
                        <div class="col-6">
                            <h6 class="text-bold">Subdirectora</h6>
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-user-circle"></i></span>
                                <h5 class="px-3 mt-1"> {{ $clubs->subdirectora }}</h5>
                            </div>
                        </div>
                    </div>
                    <div class="row pb-2">
                        <div class="col-6">
                            <h6 class="text-bold">Tesorero(a)</h6>
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-balance-scale"></i></span>
                                <h5 class="px-3 mt-1"> {{ $clubs->tesorero }}</h5>
                            </div>
                        </div>
                        <div class="col-6">
                            <h6 class="text-bold">Secretario(a)</h6>
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="far fa-user-circle"></i></span>
                                <h5 class="px-3 mt-1"> {{ $clubs->secretario }}</h5>
                            </div>
                        </div>
                    </div>
                    <div class="row pb-2">
                        <div class="col-6">
                            <h6 class="text-bold">Pastor</h6>
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-male"></i></span>
                                
                                @if ($clubs->pastor == null)
                                    <h5 class="px-3 mt-1">
                                        No asignado
                                    </h5>
                                @else
                                    <h5 class="px-3 mt-1"> {{ $clubs->pastor->name }}</h5>
                                @endif
                            </div>
                        </div>
                        <div class="col-6">
                            <h6 class="text-bold">Anciano</h6>
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-user-circle"></i></span>
                                <h5 class="px-3 mt-1"> {{ $clubs->anciano }}</h5>
                            </div>
                        </div>
                    </div>
                    <div class="row pb-2">
                        <div class="col-6">
                            <h6 class="text-bold">Fecha de aprobación</h6>
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                <h5 class="px-3 mt-1"> {{ $clubs->fechaAprobacion }}</h5>
                            </div>
                        </div>
                        <div class="col-6">
                            <h6 class="text-bold">No. Voto</h6>
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-hashtag"></i></span>
                                <h5 class="px-3 mt-1"> {{ $clubs->numeroVoto }}</h5>
                            </div>
                        </div>
                        <div class="col-6">
                            <h6 class="text-bold">Foto</h6>
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-portrait"></i></span>
                                <h5 class="px-3 mt-1"> {{ $clubs->foto }}</h5>
                            </div>
                        </div>
                        <div class="col-6">
                            <h6 class="text-bold">Significado</h6>
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-question-circle"></i></span>
                                <h5 class="px-3 mt-1"> {{ $clubs->significado }}</h5>
                            </div>
                        </div>
                    </div>
                    {{-- Footer --}}
                    <div class="flex">
                        <x-baja-club :clubs="$clubs"/>
                        <x-eliminar-club :clubs="$clubs"/>
                        <div>
                            <span class="mr-2">Editar Club</span>
                            <a href="{{ route('club.edit', $clubs) }}"> <button class="btn btn-info"><i class="fa fa-ban" aria-hidden="true"></i></button></a>
                        </div>
                    </div>
                        
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
