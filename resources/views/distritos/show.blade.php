<x-app-layout>
    <x-distrito-slot/>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if (session('message'))
                        <p class="text-red-600">{{ session('message') }}</p>
                    @endif
                    <div class="row pb-2">
                        <div class="col-6">
                            <h6 class="text-bold">Nombre del Distrito</h6>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-file-alt"></i></span>
                                <h5 class="px-3 mt-1">{{ $distrito->nombre }}</h5>
                            </div>
                        </div>
                        <div class="col-6">
                            <h6 class="text-bold">Ciudad</h6>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-file-alt"></i></span>
                                <h5 class="px-3 mt-1">{{ $distrito->ciudad }}</h5>
                            </div>
                        </div>
                        
                    </div>
                    <div class="row pb-2">
                        <div class="col-6">
                            <h6 class="text-bold">Estado</h6>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-church"></i></span>
                                <h5 class="px-3 mt-1"> {{ $distrito->estado }}</h5>
                            </div>
                        </div>
                        <div class="col-6">
                            <h6 class="text-bold">Coordinador</h6>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-user-shield"></i></span>
                                @if ($distrito->coordinador_id == null)
                                    <div class="pl-2">
                                        <a href="{{ route('asignar.distrito', ['type' => 2, 'distrito' => $distrito]) }}">
                                            <span class="bg-green-600 center rounded w-1/2 text-white">Asignar</span>
                                        </a>
                                    </div>

                                @else
                                    <div class="bg-pink-300 rounded mt-1 ml-2">
                                        <a href="{{ route('user.show', $distrito->coordinador) }}">
                                            <span class="text-white">{{ $distrito->coordinador->name }}</span>
                                        </a>
                                    </div>        
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row pb-2">
                        <div class="col-6">
                            <h6 class="text-bold">Pastor</h6>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-church"></i></span>
                                @if ($distrito->pastor_id == null)
                                    <div class="pl-2">
                                        <a href="{{ route('asignar.distrito', ['type' => 1, 'distrito' => $distrito]) }}">
                                            <span class="bg-green-600 center rounded w-1/2 text-white">Asignar</span>
                                        </a>
                                    </div>
                                @else
                                <div class="bg-pink-300 rounded ml-2 mt-1">
                                    <a href="{{ route('user.show', $distrito->pastor) }}">
                                        <span class="text-white">{{ $distrito->pastor->name }}</span>
                                    </a>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="flex">
                        {{-- Baja --}}
                        <div class="pr-2">
                            <span class="text-yellow-600 mr-2">Dar de baja</span>
                            <button class="btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#deleteDistrict"> <i class="fa fa-ban" aria-hidden="true"></i></button>
                        </div>
                        {{-- Delete --}}
                        <div class="pr-2">
                            <span class="text-red-600 mr-2">Eliminar</span>
                            <button class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#destroyDistrict"> <i class="fa fa-ban" aria-hidden="true"></i></button>
                        </div>
                        {{-- Edit --}}
                        <div class="pr-2">
                            <a href="{{ route('distrito.edit', $distrito) }}"><span class="text-blue-600">Editar</span><button class="btn btn-info"><i class="fa fa-ban" aria-hidden="true"></i></button></a>
                        </div>
                    </div>


                    <!-- The Modal -->
                    <div class="modal fade" id="deleteDistrict">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h5 class="modal-title">??Dar de baja a este distrito?</h5>
                                    <button type="button" class="close" data-bs-dismiss="modal">??</button>
                                </div>
                                <!-- Modal body -->
                                <div class="modal-body">
                                    <h5>Esta accion da de baja temporal al distrito <mark class="text-uppercase"> {{ $distrito->nombre }} </mark></h5>
                                    <form action="{{ route('distrito.delete', $distrito) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <!-- Modal footer -->
                                        <div class="modal-footer">
                                            <button class="btn btn-warning">Baja</button>
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- The Modal -->
                    <div class="modal fade" id="destroyDistrict">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h5 class="modal-title">??Eliminar Distrito?</h5>
                                    <button type="button" class="close" data-bs-dismiss="modal">??</button>
                                </div>
                                <!-- Modal body -->
                                <div class="modal-body">
                                    <h5>Esta accion no se puede deshacer, favor de confirmar su eliminacion, Eliminiar  <mark class="text-uppercase"> {{ $distrito->nombre }} </mark>? </h5>
                                    <form action="{{ route('distrito.destroy', $distrito) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <!-- Modal footer -->
                                        <div class="modal-footer">
                                            <button class="btn btn-danger">Eliminar</button>
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
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