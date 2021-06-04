<x-app-layout>
    <x-user-slot/>
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
                                <h5 class="px-1 mt-1"> {{ $user->email }}</h5>
                            </div>
                        </div>
                    </div>
                    <div class="row pb-2">                        
                        <div class="col-6 mt-3 flex">
                            <div class="mr-3"><span class="input-group-text"><i class="fab fa-atlassian"></i></span></div>
                                <div><h6>Usuario ya asignado como </h6>
                                    @switch($user->director->rol)
                                        @case(1)
                                             <h6 class="text-yellow-700">Director</h6>
                                            @break
                                        @case(2)
                                             <h6 class="text-yellow-700">Secretario</h6>
                                            @break
                                        @case(3)
                                             <h6 class="text-yellow-700">Encargado</h6>
                                            @break
                                        @case(4)
                                             <h6 class="text-yellow-700">Pastor</h6>
                                            @break
                                        @case(5)
                                             <h6 class="text-yellow-700">Coordinador</h6>
                                            @break
                                        @case(6)
                                            <h6 class="text-yellow-700">Director de Club</h6>
                                            @break
                                        @case(7)
                                            <h6 class="text-yellow-700">Director de Categoria</h6>
                                            @if (Auth::user()->director->asignado == 0)
                                                <button class="btn btn-outline-danger" data-toggle="modal" data-target="#asignarUsuario"> <i class="fa fa-ban" aria-hidden="true"></i></button>
                                            @endif
                                            @break
                                        @default
                                            <h6 class="text-yellow-700">Admin</h6>
                                    @endswitch
                                </div>
                        </div>
                        <div class="col-6 mt-3">
                            @if ($user == Auth::user())
                                <a href="{{ route('cambiar.contra') }}"><p class="bg-indigo-800 text-white rounded w-1/2 pl-2">Cambiar Contraseña</p></a>
                            @else
                                <div class="flex">
                                    <div> <span class="text-bold">Clave</span> </div>
                                    <div class="ml-3"><button class="bg-purple-800 rounded w-14" data-toggle="modal" data-target="#resetClave"> <span class="text-white"> Reset</span></button></div>
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="grid grid-cols-2 md:flex">
                        <div class="pt-2"><x-baja-usuario :user="$user"/></div>
                        <div class="pt-2"><x-eliminar-usuario :user="$user"/></div>
                        <div class="pt-2"><span class="mr-2">Editar Usuario</span>
                            <a href="{{ route('user.edit', $user) }}"> <button class="btn btn-info"><i class="fa fa-ban" aria-hidden="true"></i></button></a></div>
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

                    <div class="modal fade" id="asignarclub">
                        <div class="modal-dialog modal-dialog-centered modal-lg">
                            <div class="modal-content">
                                <!-- Modal Header -->
                                <div class="modal-header">                                               
                                    <h5>Elegir a un Club para {{ $user->name }}</h5>
                                    <button type="button" class="close" data-dismiss="modal">×</button>
                                </div>
                                <!-- Modal body -->
                                <div class="modal-body">
                                    @switch($user->director->rol)
                                        @case(4)
                                            @if ($clubs->isEmpty())
                                                <p>No hay Clubs en existencia, </p> <a href="{{ route('clubes.crear') }}">Crear</a>
                                            @endif
                                            @foreach ($clubs as $club)
                                                <form action="{{ route('store.pastor') }}">
                                                    <input type="hidden" name="club" id="club" value="{{ $club->id }}">
                                                    <input type="hidden" name="pastor" id="pastor" value="{{ $user->id }}">
                                                    <button class="bg-gray-300 w-1/5 mt-3 h-12 rounded"> <span class="text-gray-700">{{ $club->nombreClub }}</span> </button>
                                                </form>
                                            @endforeach

                                            @break
                                        @case(6)
                                            @foreach ($clubs as $club)
                                                <form action="{{ route('store.director') }}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <input type="hidden" name="club" id="club" value="{{ $club->id }}">
                                                    <input type="hidden" name="director" id="director" value="{{ $user->id }}">
                                                    <button class="bg-gray-300 w-1/5 mt-3 h-12 rounded"> <span class="text-gray-700">{{ $club->nombreClub }}</span> </button>
                                                </form>
                                            @endforeach
                                            @break

                                        @case(7)
                                            @if ($clubs->isEmpty())
                                                <p>No hay Clubs en existencia, </p> <a href="{{ route('clubes.crear') }}">Crear</a>
                                            @endif
                                                @foreach ($clubs as $club)
                                                <div class="mb-2 bg-gray-300 w-1/3 h-8 text-center">
                                                    <a href="{{ route('club.show', $club) }}"> <span class="text-gray-700">{{ $club->nombreClub }}</span> </a>
                                                </div>    
                                                @endforeach
                                        @default 
                                                    
                                    @endswitch
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="asignarDistrito">
                        <div class="modal-dialog modal-dialog-centered modal-lg">
                            <div class="modal-content">
                                <!-- Modal Header -->
                                <div class="modal-header">                                               
                                    <h5>Elegir un Distrito para {{ $user->name }}</h5>
                                    <button type="button" class="close" data-dismiss="modal">×</button>
                                </div>
                                <!-- Modal body -->
                                <div class="modal-body">
                                    @switch($user->director->rol)
                                        @case(4)
                                            @foreach ($distritos as $distrito)
                                                @if ($distrito->pastor_id == null)    
                                                    <form action="{{ route('store.pastor.distrito', $distrito) }}" method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <input type="hidden" name="distrito" id="distrito" value="{{ $distrito }}">
                                                        <input type="hidden" name="pastor" id="pastor" value="{{ $user->director->id }}">
                                                        <button class="bg-gray-300 w-1/5 mt-3 h-12 rounded"> <span class="text-gray-700">{{ $distrito->nombre }}</span> </button>
                                                    </form>
                                                @endif
                                            @endforeach
                                            @break
                                        @case(5)
                                            @foreach ($distritos as $distrito)
                                                @if ($distrito->coordinador_id == null) 
                                                    <form action="{{ route('store.coordinador.distrito', $distrito) }}" method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <input type="hidden" name="coordinador" id="coordinador" value="{{ $user->director->id }}">
                                                        <button class="bg-gray-300 w-1/5 mt-3 h-12 rounded"> <span class="text-gray-700">{{ $distrito->nombre }}</span> </button>
                                                    </form>
                                                @endif
                                            @endforeach
                                            @break
                                        @default 
                                    @endswitch
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- The Modal -->
                    <div class="modal fade" id="deleteUser">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h5 class="modal-title">Elegir una Categoria</h5>
                                    <button type="button" class="close" data-dismiss="modal">×</button>
                                </div>
                                <!-- Modal body -->
                                <div class="modal-body">
                                    <h5>Esta accion no se puede deshacer, ¿Eliminar <mark class="text-uppercase">{{ $user->name }} </mark> ?</h5>
                                    <form action="{{ route('user.destroy', $user) }}" method="post">
                                        
                                        <div class="modal-footer">
                                            <button class="btn btn-danger">Eliminar</button>
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>