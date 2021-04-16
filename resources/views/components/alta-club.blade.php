<div class="container">
    <div class="card">
        <div class="card-header"></div>
        <div class="card-body">
            <h4>Registra un nuevo club</h4>
            <form action="/club" method="post">
                @csrf
                <div class="row">
                    <div class="col-6">
                        <label for="exampleInputEmail1">Nombre del club</label>
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-file-alt"></i></span>
                            <input type="text" name="nombreClub" id="nombreClub" class="form-control form-control-sm" placeholder="Ejemplo: Centinelas">
                        </div>
                    </div>
                    <div class="col-6">
                        <label for="exampleInputEmail1">Significado</label>
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-question-circle"></i></span>
                            <input type="text" name="significado" id="significado" class="form-control form-control-sm" placeholder="Ejemplo: Guardianes de Cristo">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <label for="exampleInputEmail1">Iglesia</label>
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-church"></i></span>
                            <input type="text" name="iglesia" id="iglesia" class="form-control form-control-sm" placeholder="Ejemplo: Tajín">
                        </div>
                    </div>
                    <div class="col-6">
                        <label for="exampleInputEmail1">Director</label>
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user-shield"></i></span>
                            <input type="text" name="director" id="director" class="form-control form-control-sm" placeholder="Nombre del director">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <label for="exampleInputEmail1">Subdirector</label>
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-user-circle"></i></span>
                            <input type="text" name="subdirector" id="subdirector" class="form-control form-control-sm" placeholder="Nombre del subdirector">
                        </div>
                    </div>
                    <div class="col-6">
                        <label for="exampleInputEmail1">Subdirectora</label>
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-user-circle"></i></span>
                            <input type="text" name="subdirectora" id="subdirectora" class="form-control form-control-sm" placeholder="Nombre de la subdirectora">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <label for="exampleInputEmail1">Tesorero(a)</label>
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-balance-scale"></i></span>
                            <input type="text" name="tesorero" id="tesorero" class="form-control form-control-sm" placeholder="Nombre del tesorero(@)">
                        </div>
                    </div>
                    <div class="col-6">
                        <label for="exampleInputEmail1">Secretario(a)</label>
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="far fa-user-circle"></i></span>
                            <input type="text" name="secretario" id="secretario" class="form-control form-control-sm" placeholder="Nombre del secretario(@)">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <label for="exampleInputEmail1">Pastor</label>
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-balance-scale"></i></span>
                            <input type="text" name="pastor" id="pastor" class="form-control form-control-sm" placeholder="Nombre del Pastor de distrito">
                        </div>
                    </div>
                    <div class="col-6">
                        <label for="exampleInputEmail1">Anciano</label>
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-user-circle"></i></span>
                            <input type="text" name="anciano" id="anciano" class="form-control form-control-sm" placeholder="Nombre del anciano de Iglesia">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <label for="exampleInputEmail1">Fecha de aprobación</label>
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                            <input type="date" name="fechaAprobacion" id="fechaAprobacion" class="form-control form-control-sm" placeholder="">
                        </div>
                    </div>
                    <div class="col-6">
                        <label for="exampleInputEmail1">No. Voto</label>
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-hashtag"></i></span>
                            <input type="number" name="numeroVoto" id="numeroVoto" class="form-control form-control-sm" placeholder="">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <label for="exampleInputEmail1">Foto</label>
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-portrait"></i></span>
                            <input type="file" name="foto" id="foto" class="form-control" placeholder="">
                        </div>
                    </div>
                </div>
                <div class="flex justify-end">
                    <button class="btn btn-info"><i class="fa fa-save">Guardar</i></button>
                </div>
            </form>
        </div>
    </div>

    
                    
                </div>

                

            </div>
        </div>
    </div>
</div>