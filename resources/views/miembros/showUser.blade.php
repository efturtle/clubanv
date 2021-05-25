<x-app-layout>
    <x-miembros-slot/>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if (session('message'))
                        <h5 class="text-success">{{ session('message') }}</h5>
                    @endif
                    <div class="row pb-2">
                        <div class="col-6">
                            <label>Nombre de usuario</label>
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                <h5 class="px-3 mt-1">{{ $user->name }}</h5>
                            </div>
                        </div>
                        <div class="col-6">
                            <label>Email</label>
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-question-circle"></i></span>
                                <h5 class="px-3 mt-1"> {{ $user->email }}</h5>
                            </div>
                        </div>
                    </div>
                    <div class="row pb-2">                        
                        <div class="col-6">
                            <label>Club</label>
                            <div class="flex">
                                <div class="mr-3"><span class="input-group-text"><i class="fab fa-atlassian"></i></span></div>
                                <a href="{{ route('club.show', $user->miembro->club_id) }}">
                                    <div><h5 class="px-2 mt-1">{{ $user->miembro->club->nombreClub }}</h5></div>
                                </a>

                            </div>
                        </div>
                        <div class="col-6">
                            <label>Categoria</label>
                            <div class="flex">
                                <div class="mr-3"><span class="input-group-text"><i class="fab fa-atlassian"></i></span></div>
                                @switch($user->miembro->category)
                                    @case(1)
                                        <div><h5 class="px-2 mt-1">Aventurero</h5></div>
                                        @break
                                    @case(2)
                                        <div><h5 class="px-2 mt-1">Aventurero</h5></div>
                                        @break
                                    @case(3)
                                        <div><h5 class="px-2 mt-1">Guias Mayores</h5></div>
                                        @break
                                    @default
                                @endswitch
                            </div>
                        </div>
                    </div>
                    <div class="row pb-2">
                        <div class="col-6 mt-3">
                            <div class="flex">
                                <div> <span class="text-bold">Clave</span> </div>
                                <div class="ml-3"><button class="bg-purple-800 rounded w-14" data-toggle="modal" data-target="#resetClave"> <span class="text-white">Reset</span></button></div>
                            </div>
                        </div>
                    </div>


                    <div class="modal fade" id="resetClave">
                        <div class="modal-dialog modal-dialog-centered modal-lg">
                            <div class="modal-content">
                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h5>Resetear Contraseña para {{ $user->name }}?</h5>
                                    <button type="button" class="close" data-dismiss="modal">×</button>
                                </div>
                                <!-- Modal body -->
                                <div class="modal-body">
                                    <form action="{{ route('store.reset', $user) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" value="{{ $user }}">
                                    <button class="bg-yellow-500 w-1/5 rounded">Si</button>
                                    </form>
                                    <button type="button" class="close" data-dismiss="modal">Cancelar</button>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
</x-app-layout>
                