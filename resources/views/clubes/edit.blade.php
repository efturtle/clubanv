<x-app-layout>
    <x-club-slot/>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h4 class="text-blue-800">Editar informacion del club <span class="italic capitalize">{{ $clubs->nombreClub }}</span></h4>
                    <form action="{{ route('club.update', $clubs->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-6">
                                <label for="exampleInputEmail1">Nombre del club</label>
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-file-alt"></i></span>
                                    <input type="text" name="nombreClub" id="nombreClub" class="form-control form-control-sm" value="{{ $clubs->nombreClub }}">
                                </div>
                            </div>
                            <div class="col-6">
                                <label for="exampleInputEmail1">Significado</label>
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-question-circle"></i></span>
                                    <input type="text" name="significado" id="significado" class="form-control form-control-sm" value="{{ $clubs->significado }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <label for="exampleInputEmail1">Iglesia</label>
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-church"></i></span>
                                    <input type="text" name="iglesia" id="iglesia" class="form-control form-control-sm" value="{{ $clubs->iglesia }}">
                                </div>
                            </div>
                            <div class="col-6">
                                <label for="exampleInputEmail1">Director</label>
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-user-shield"></i></span>
                                    @if ($clubs->director == null)
                                    <input type="text" name="director" id="director" class="form-control form-control-sm">
                                    @else
                                        <input type="text" name="director" id="director" class="form-control form-control-sm" value="{{ $clubs->director->name }}">    
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <label for="exampleInputEmail1">Subdirector</label>
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-user-circle"></i></span>
                                    <input type="text" name="subdirector" id="subdirector" class="form-control form-control-sm" value="{{ $clubs->subdirector }}">
                                </div>
                            </div>
                            <div class="col-6">
                                <label for="exampleInputEmail1">Subdirectora</label>
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-user-circle"></i></span>
                                    <input type="text" name="subdirectora" id="subdirectora" class="form-control form-control-sm" value="{{ $clubs->subdirectora }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <label for="exampleInputEmail1">Tesorero(a)</label>
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-balance-scale"></i></span>
                                    <input type="text" name="tesorero" id="tesorero" class="form-control form-control-sm" value="{{ $clubs->tesorero }}">
                                </div>
                            </div>
                            <div class="col-6">
                                <label for="exampleInputEmail1">Secretario(a)</label>
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="far fa-user-circle"></i></span>
                                    <input type="text" name="secretario" id="secretario" class="form-control form-control-sm" value="{{ $clubs->secretario }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <label for="exampleInputEmail1">Pastor</label>
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-balance-scale"></i></span>
                                    @if ($clubs->pastor == null)
                                    <input type="text" name="director" id="director" class="form-control form-control-sm">
                                    @else
                                        <input type="text" name="director" id="director" class="form-control form-control-sm" value="{{ $clubs->pastor->name }}">    
                                    @endif
                                </div>
                            </div>
                            <div class="col-6">
                                <label for="exampleInputEmail1">Anciano</label>
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-user-circle"></i></span>
                                    <input type="text" name="anciano" id="anciano" class="form-control form-control-sm" value="{{ $clubs->anciano }}">
                                </div>
                            </div>
                        </div>
                        <br>
                            <button class="btn btn-info"><i class="fa fa-save">Guardar</i></button>
                            <a href="/club">
                                <button type="button" class="btn btn-secondary">Cerrar</button>
                            </a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
