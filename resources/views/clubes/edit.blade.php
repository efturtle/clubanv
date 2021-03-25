@include('nav')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h4>Editar informacion del club</h4>
    </section>
        <!-- Main content -->
    <section class="content">
        <form action="/club/{{ $clubs->id }}" method="post">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-6">
                    <label for="exampleInputEmail1">Nombre del club</label>
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-file-text"></i></span>
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
                        <span class="input-group-text"><i class="fa fa-circle-o-notch"></i></span>
                        <input type="text" name="iglesia" id="iglesia" class="form-control form-control-sm" value="{{ $clubs->iglesia }}">
                    </div>
                </div>
                <div class="col-6">
                    <label for="exampleInputEmail1">Director</label>
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-user-circle-o"></i></span>
                        <input type="text" name="director" id="director" class="form-control form-control-sm" value="{{ $clubs->director }}">
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
                        <span class="input-group-text"><i class="fa fa-user-o"></i></span>
                        <input type="text" name="tesorero" id="tesorero" class="form-control form-control-sm" value="{{ $clubs->tesorero }}">
                    </div>
                </div>
                <div class="col-6">
                    <label for="exampleInputEmail1">Secretario(a)</label>
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-user-o"></i></span>
                        <input type="text" name="secretario" id="secretario" class="form-control form-control-sm" value="{{ $clubs->secretario }}">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <label for="exampleInputEmail1">Pastor</label>
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-male"></i></span>
                        <input type="text" name="pastor" id="pastor" class="form-control form-control-sm" value="{{ $clubs->pastor }}">
                    </div>
                </div>
                <div class="col-6">
                    <label for="exampleInputEmail1">Anciano</label>
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-smile-o"></i></span>
                        <input type="text" name="anciano" id="anciano" class="form-control form-control-sm" value="{{ $clubs->anciano }}">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <label for="exampleInputEmail1">Fecha de aprobación</label>
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                        <input type="date" name="fechaAprobacion" id="fechaAprobacion" class="form-control form-control-sm" value="{{ $clubs->fechaAprobacion }}">
                    </div>
                </div>
                <div class="col-6">
                    <label for="exampleInputEmail1">No. Voto</label>
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-hashtag"></i></i></span>
                        <input type="number" name="numeroVoto" id="numeroVoto" class="form-control form-control-sm" value="{{ $clubs->numeroVoto }}">
                    </div>
                </div>
            </div>
            <br>
                <button class="btn btn-info"><i class="fa fa-save">Guardar</i></button>
                <a href="/club">
                    <button type="button" class="btn btn-secondary">Cerrar</button>
                </a>
        </form>
    </section>
</div>
    
@include('footer')


