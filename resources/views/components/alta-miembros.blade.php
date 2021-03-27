<div>
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <label for="exampleInputEmail1">Buscar</label>
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-search"></i></span>
                    <input type="text" class="form-control form-control-sm" placeholder="Insertar nombre">
                </div>
            </div>
            <div class="col-lg-3">
    
                <div class="input-group-prepend">
    
                </div>
            </div>
            <div class="col-lg-3">
                <label for="exampleInputEmail1">Opciones</label>
                <div class="input-group-prepend">
                    <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#myModal">
                        Registrar
                    </button>
                </div>
            </div>
        </div>
    
        <!-- The Modal -->
        <div class="modal fade" tabindex="-1" role="dialog" id="myModal" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
    
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title text-indigo-800">Datos Personales</h4>
                        <button type="button" class="close" data-dismiss="modal">×</button>
                    </div>
                    <!-- Modal body -->
                    <div class="modal-body modal-info">
                        <div class="row">
                            <div class="col-6">
                                <label for="exampleInputEmail1">Nombre</label>
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-user-o"></i></span>
                                    <input type="text" class="form-control form-control-sm" placeholder="Inserte el nombre">
                                </div>
                            </div>
                            <div class="col-6">
                                <label for="exampleInputEmail1">Apellidos</label>
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-caret-right"></i></span>
                                    <input type="text" class="form-control form-control-sm" placeholder="">
                                </div>
                            </div>
                        </div>
    
                        <div class="row">
                            <div class="col-6">
                                <label for="exampleInputEmail1">Fecha de nacimiento</label>
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                    <input type="date" class="form-control form-control-sm" placeholder="">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-8">
                                <label for="exampleInputEmail1">Direccion</label>
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-map-marker"></i></span>
                                    <input type="text" class="form-control form-control-sm" placeholder="Ejemplo: Calle, No.#">
                                </div>
                            </div>
                            <div class="col-4">
                                <label for="exampleInputEmail1">Provincia/Colonia</label>
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-bullseye"></i></span>
                                    <input type="text" class="form-control form-control-sm" placeholder="Ejemplo: Col. Tajín">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <label for="exampleInputEmail1">Código Postal</label>
                                <input type="text" class="form-control form-control-sm" placeholder="">
                            </div>
                            <div class="col-3">
                                <label for="exampleInputEmail1">Nacionalidad</label>
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-globe"></i></span>
                                    <input type="text" class="form-control form-control-sm" placeholder="">
                                </div>
                            </div>
                            <div class="col-3">
                                <label for="exampleInputEmail1">Estado</label>
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-flag"></i></span>
                                    <!--<select name="select" data-select2-id="19">-->
                                    <select class="form-control form-control-sm" id="inputGroupSelect02">
                                        <option selected>Seleccione</option>
                                        <option value="1">Aguascalientes</option>
                                        <option value="2">Baja California</option>
                                        <option value="3">Baja California Sur</option>
                                        <option value="4">Campeche</option>
                                        <option value="5">Chiapas</option>
                                        <option value="6">Chihuahua</option>
                                        <option value="7">Ciudad de México</option>
                                        <option value="8">Coahuila</option>
                                        <option value="9">Colima</option>
                                        <option value="10">Durango</option>
                                        <option value="11">Estado de México</option>
                                        <option value="12">Guanajuato</option>
                                        <option value="13">Guerrero</option>
                                        <option value="14">Hidalgo</option>
                                        <option value="15">Jalisco</option>
                                        <option value="16">Michoacán</option>
                                        <option value="17">Morelos</option>
                                        <option value="18">Nayarit</option>
                                        <option value="19">Nuevo León</option>
                                        <option value="20">Oaxaca</option>
                                        <option value="21">Puebla</option>
                                        <option value="22">Querétaro</option>
                                        <option value="23">Quintana Roo</option>
                                        <option value="24">San Luis Potosí</option>
                                        <option value="25">Sinaloa</option>
                                        <option value="26">Sonora</option>
                                        <option value="27">Tabasco</option>
                                        <option value="28">Tamaulipas</option>
                                        <option value="29">Tlaxcala</option>
                                        <option value="30">Veracruz</option>
                                        <option value="31">Yucatán</option>
                                        <option value="32">Zacatecas</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-3">
                                <label for="exampleInputEmail1">Ciudad</label>
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-building"></i></span>
                                    <input type="text" class="form-control form-control-sm" placeholder="Ejemplo: Poza Rica">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <label for="exampleInputEmail1">Tipo de sangre</label>
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-heartbeat"></i></span>
                                    <select class="form-control form-control-sm" id="inputGroupSelect02">
                                        <option selected>Seleccione</option>
                                        <option value="1">A+</option>
                                        <option value="2">B+</option>
                                        <option value="3">O+</option>
                                        <option value="4">AB+</option>
                                        <option value="5">A-</option>
                                        <option value="6">B+</option>
                                        <option value="7">O-</option>
                                        <option value="8">AB-</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-3">
                                <label for="exampleInputEmail1">¿Padece de alergias?</label>
                                <select class="form-control form-control-sm" id="inputGroupSelect02">
                                    <option selected>Seleccione</option>
                                    <option value="1">Si</option>
                                    <option value="2">No</option>
                                    <option value="3">Desconozco</option>
                                </select>
                            </div>
                            <div class="col-3">
                                <label for="exampleInputEmail1">¿Cuál?</label>
                                <input type="text" class="form-control form-control-sm" placeholder="Describa el tipo de alergia">
                            </div>
                            <div class="col-3">
                                <label for="exampleInputEmail1">Sexo</label>
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-circle-thin"></i></span>
                                    <select class="form-control form-control-sm" id="inputGroupSelect02">
                                        <option selected>Seleccione</option>
                                        <option value="1">Femenino</option>
                                        <option value="2">Masculino</option>
                                        <option value="3">Omitir</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="text-indigo-800">Datos Familiares</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-3">
                                                <label for="exampleInputEmail1">Padre</label>
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fa fa-user-o"></i></span>
                                                    <input type="text" class="form-control form-control-sm" placeholder="Inserte el nombre del padre">
                                                </div>
                                            </div>
                                            <div class="col-5">
                                                <label for="exampleInputEmail1">Apellidos</label>
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fa fa-caret-right"></i></span>
                                                    <input type="text" class="form-control form-control-sm" placeholder="">
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <label for="exampleInputEmail1">Contacto</label>
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fa fa-address-card"></i></span>
                                                    <input type="text" class="form-control form-control-sm" placeholder="Ejemplo: #5555550000">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-3">
                                                <label for="exampleInputEmail1">Madre</label>
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fa fa-user-o"></i></i></span>
                                                    <input type="text" class="form-control form-control-sm" placeholder="Inserte el nombre de la madre">
                                                </div>
                                            </div>
                                            <div class="col-5">
                                                <label for="exampleInputEmail1">Apellidos</label>
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fa fa-caret-right"></i></span>
                                                    <input type="text" class="form-control form-control-sm" placeholder="">
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <label for="exampleInputEmail1">Contacto</label>
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fa fa-address-card"></i></span>
                                                    <input type="text" class="form-control form-control-sm" placeholder="Ejemplo: #5555550000">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
    
                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-info" data-dismiss="modal" data-toggle="modal" id="btn_sa1"><i class="fa fa-floppy-o"></i></button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        {{-- <button type="button" class="btn btn-danger" data-dismiss="modal" data-toggle="modal" data-target="#myModal2" id="btn_sa2"><i class="fa fa-arrow-right"></i></button> --}}
                    </div>
    
                </div>
            </div>
        </div>
    
        <!-- The Modal -->
        <div class="modal fade" id="myModal2">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
    
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Datos Familiares</h4>
                        <button type="button" class="close" data-dismiss="modal">×</button>
                    </div>
                    <!-- Modal body -->
                    <div class="modal-body">
    
                        <div class="row">
                            <div class="col-3">
                                <label for="exampleInputEmail1">Padre</label>
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-user-friends"></i></span>
                                    <input type="text" class="form-control form-control-sm" placeholder="Inserte el nombre del padre">
                                </div>
                            </div>
                            <div class="col-5">
                                <label for="exampleInputEmail1">Apellidos</label>
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-signature"></i></span>
                                    <input type="text" class="form-control form-control-sm" placeholder="">
                                </div>
                            </div>
                            <div class="col-4">
                                <label for="exampleInputEmail1">Contacto</label>
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-address-book"></i></span>
                                    <input type="text" class="form-control form-control-sm" placeholder="Ejemplo: #5555550000">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <label for="exampleInputEmail1">Madre</label>
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-user-friends"></i></i></span>
                                    <input type="text" class="form-control form-control-sm" placeholder="Inserte el nombre de la madre">
                                </div>
                            </div>
                            <div class="col-5">
                                <label for="exampleInputEmail1">Apellidos</label>
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-signature"></i></span>
                                    <input type="text" class="form-control form-control-sm" placeholder="">
                                </div>
                            </div>
                            <div class="col-4">
                                <label for="exampleInputEmail1">Contacto</label>
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-address-book"></i></span>
                                    <input type="text" class="form-control form-control-sm" placeholder="Ejemplo: #5555550000">
                                </div>
                            </div>
                        </div>
    
                    </div>
    
                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal" data-toggle="modal" data-target="#myModal"><i class="fas fa-arrow-left"></i></button>
                        <button type="button" class="btn btn-info" data-dismiss="modal"><i class="far fa-save"></i>Guardar</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    </div>
    
                </div>
            </div>
        </div>
    </div>
    
    <!--<script src="../js/SAsystems/swa_tutopad.js"></script>
    <script src="../js/sweetAlert.js"></script>-->
</div>