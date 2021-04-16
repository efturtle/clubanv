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
                            <label for="exampleInputEmail1">Nombre del club</label>
                            <div class="input-group-prepend">
                                <span class="input-group-text "><i class="fas fa-file-alt"></i></span>
                                <h5 class="px-3 mt-1">{{ $clubs->nombreClub }}</h5>
                            </div>
                        </div>
                        <div class="col-6">
                            <label for="exampleInputEmail1">Significado</label>
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-question-circle"></i></span>
                                <h5 class="px-3 mt-1"> {{ $clubs->significado }}</h5>
                            </div>
                        </div>
                    </div>
                    <div class="row pb-2">
                        <div class="col-6">
                            <label for="exampleInputEmail1">Iglesia</label>
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-church"></i></span>
                                <h5 class="px-3 mt-1"> {{ $clubs->iglesia }}</h5>
                            </div>
                        </div>
                        <div class="col-6">
                            <label for="exampleInputEmail1">Director</label>
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user-shield"></i></span>
                                <h5 class="px-3 mt-1"> {{ $clubs->director }}</h5>
                            </div>
                        </div>
                    </div>
                    <div class="row pb-2">
                        <div class="col-6">
                            <label for="exampleInputEmail1">Subdirector</label>
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-user-circle"></i></span>
                                <h5 class="px-3 mt-1"> {{ $clubs->subdirector }}</h5>
                            </div>
                        </div>
                        <div class="col-6">
                            <label for="exampleInputEmail1">Subdirectora</label>
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-user-circle"></i></span>
                                <h5 class="px-3 mt-1"> {{ $clubs->subdirectora }}</h5>
                            </div>
                        </div>
                    </div>
                    <div class="row pb-2">
                        <div class="col-6">
                            <label for="exampleInputEmail1">Tesorero(a)</label>
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-balance-scale"></i></span>
                                <h5 class="px-3 mt-1"> {{ $clubs->tesorero }}</h5>
                            </div>
                        </div>
                        <div class="col-6">
                            <label for="exampleInputEmail1">Secretario(a)</label>
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="far fa-user-circle"></i></span>
                                <h5 class="px-3 mt-1"> {{ $clubs->secretario }}</h5>
                            </div>
                        </div>
                    </div>
                    <div class="row pb-2">
                        <div class="col-6">
                            <label for="exampleInputEmail1">Pastor</label>
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-male"></i></span>
                                <h5 class="px-3 mt-1"> {{ $clubs->pastor }}</h5>
                            </div>
                        </div>
                        <div class="col-6">
                            <label for="exampleInputEmail1">Anciano</label>
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-user-circle"></i></span>
                                <h5 class="px-3 mt-1"> {{ $clubs->anciano }}</h5>
                            </div>
                        </div>
                    </div>
                    <div class="row pb-2">
                        <div class="col-6">
                            <label for="exampleInputEmail1">Fecha de aprobación</label>
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                <h5 class="px-3 mt-1"> {{ $clubs->fechaAprobacion }}</h5>
                            </div>
                        </div>
                        <div class="col-6">
                            <label for="exampleInputEmail1">No. Voto</label>
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-hashtag"></i></span>
                                <h5 class="px-3 mt-1"> {{ $clubs->numeroVoto }}</h5>
                            </div>
                        </div>
                        <div class="col-6">
                            <label for="exampleInputEmail1">Foto</label>
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-portrait"></i></span>
                                <h5 class="px-3 mt-1"> {{ $clubs->foto }}</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer flex items-center justify-between">
                    <x-baja-club :clubId="$clubs->id" :clubName="$clubs->nombreClub"></x-baja-club>
                    <x-eliminar-club :clubId="$clubs->id" :clubName="$clubs->nombreClub"> </x-eliminar-club>
                    <div>
                        <span class="mr-2">Editar Club</span>
                        <a href="/club/edit/{{ $clubs->id }}"> <button class="btn btn-info"><i class="fa fa-ban" aria-hidden="true"></i></button></a>
                    </div>
                </div>
            </div>
    </section>
    </section>
</div>
@include('footer')
    