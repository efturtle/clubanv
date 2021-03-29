@include('nav')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    
    </section>
        <!-- Main content -->
    <section class="content">        
        <form action="/miembro/{{ $miembros->id }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-6">
                    <label for="exampleInputEmail1">Nombre</label>
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-user-o"></i></span>
                        <input type="text" name="nombre" id="nombre" class="form-control form-control-sm" value="{{ $miembros->nombre }}" required>
                    </div>
                </div>
                <div class="col-6">
                    <label for="exampleInputEmail1">Apellidos</label>
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-caret-right"></i></span>
                        <input type="text" name="apellidos" id="apellidos" class="form-control form-control-sm" value="{{ $miembros->apellidos }}" required>
                    </div>
                </div>
                <input type="hidden" name="usuario" id="usuario" value="happyuser">
                <input type="hidden" name="clave" id="clave" value="happycode">
            </div>

            <div class="row">
                <div class="col-6">
                    <label for="exampleInputEmail1">Fecha de nacimiento</label>
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                        <input type="date" name="fechaNacimiento" id="fechaNacimiento" class="form-control form-control-sm" value="{{ $miembros->fechaNacimiento }}" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-8">
                    <label for="exampleInputEmail1">Direccion</label>
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-map-marker"></i></span>
                        <input type="text" name="direccion" id="direccion" class="form-control form-control-sm" value="{{ $miembros->direccion }}" required>
                    </div>
                </div>
                <div class="col-4">
                    <label for="exampleInputEmail1">Provincia/Colonia</label>
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-bullseye"></i></span>
                        <input type="text" name="provincia_colonia" id="provincia_colonia" class="form-control form-control-sm" value="{{ $miembros->provincia_colonia }}" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-3">
                    <label for="exampleInputEmail1">Código Postal</label>
                    <input type="text" name="codigoPostal" id="codigoPostal" class="form-control form-control-sm" value="{{ $miembros->codigoPostal }}" required>
                </div>
                <div class="col-3">
                    <label for="exampleInputEmail1">Nacionalidad</label>
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-globe"></i></span>
                        <input type="text" name="nacionalidad" id="nacionalidad" class="form-control form-control-sm" value="{{ $miembros->nacionalidad }}" required>
                    </div>
                </div>
                <div class="col-3">
                    <label for="exampleInputEmail1">Estado</label>
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-flag"></i></span>
                        <select class="form-control form-control-sm" name="estado" id="estado" required> 
                            <option selected>{{ $miembros->estado }}</option>
                            <option value="Aguascalientes">Aguascalientes</option>
                            <option value="Baja California">Baja California</option>
                            <option value="Baja California Sur">Baja California Sur</option>
                            <option value="Campeche">Campeche</option>
                            <option value="Chiapas">Chiapas</option>
                            <option value="Chihuahua">Chihuahua</option>
                            <option value="Ciudad de México">Ciudad de México</option>
                            <option value="Coahuila">Coahuila</option>
                            <option value="Colima">Colima</option>
                            <option value="Durango">Durango</option>
                            <option value="Estado de México">Estado de México</option>
                            <option value="Guanajuato">Guanajuato</option>
                            <option value="Guerrero">Guerrero</option>
                            <option value="Hidalgo">Hidalgo</option>
                            <option value="Jalisco">Jalisco</option>
                            <option value="Michoacán">Michoacán</option>
                            <option value="Morelos">Morelos</option>
                            <option value="Nayarit">Nayarit</option>
                            <option value="Nuevo León">Nuevo León</option>
                            <option value="Oaxaca">Oaxaca</option>
                            <option value="Puebla">Puebla</option>
                            <option value="Querétaro">Querétaro</option>
                            <option value="Quintana Roo">Quintana Roo</option>
                            <option value="San Luis Potosí">San Luis Potosí</option>
                            <option value="Sinaloa">Sinaloa</option>
                            <option value="Sonora">Sonora</option>
                            <option value="Tabasco">Tabasco</option>
                            <option value="Tamaulipas">Tamaulipas</option>
                            <option value="Tlaxcala">Tlaxcala</option>
                            <option value="Veracruz">Veracruz</option>
                            <option value="Yucatán">Yucatán</option>
                            <option value="Zacatecas">Zacatecas</option>
                        </select>
                    </div>
                </div>
                <div class="col-3">
                    <label for="exampleInputEmail1">Ciudad</label>
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-building"></i></span>
                        <input type="text" name="ciudad" id="ciudad" class="form-control form-control-sm" value="{{ $miembros->ciudad }}" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-3">
                    <label for="exampleInputEmail1">Tipo de sangre</label>
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-heartbeat"></i></span>
                        <select class="form-control form-control-sm" name="tipoSangre" id="tipoSangre" required>
                            <option selected>{{ $miembros->tipoSangre }}</option>
                            <option value="A+">A+</option>
                            <option value="B+">B+</option>
                            <option value="O+">O+</option>
                            <option value="AB+">AB+</option>
                            <option value="A-">A-</option>
                            <option value="B+">B+</option>
                            <option value="O-">O-</option>
                            <option value="AB-">AB-</option>
                        </select>
                    </div>
                </div>
                <div class="col-3">
                    <label for="exampleInputEmail1">¿Padece de alergias?</label>
                    <select class="form-control form-control-sm" name="confirmaAlergias" id="confirmaAlergias" required>
                        <option selected>{{ $miembros->confirmaAlergias }}</option>
                        <option value="si">Si</option>
                        <option value="no">No</option>
                        <option value="desconoce">Desconozco</option>
                    </select>
                </div>
                <div class="col-3">
                    <label for="exampleInputEmail1">¿Cuál?</label>
                    <input type="text" name="alergia" id="alergia" class="form-control form-control-sm" value="{{ $miembros->alergia }}" >
                </div>
                <div class="col-3">
                    <label for="exampleInputEmail1">Sexo</label>
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-circle-thin"></i></span>
                        <select class="form-control form-control-sm" name="sexo" id="sexo" required>
                            <option selected>{{ $miembros->sexo }}</option>
                            <option value="femenino">Femenino</option>
                            <option value="masculino">Masculino</option>
                            <option value="otro">Otro</option>
                        </select>
                    </div>
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
                                    <input type="text" name="nombrePadre" id="nombrePadre" class="form-control form-control-sm" value="{{ $miembros->nombrePadre }}">
                                </div>
                            </div>
                            <div class="col-5">
                                <label for="exampleInputEmail1">Apellidos</label>
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-caret-right"></i></span>
                                    <input type="text" name="apellidosPadre" id="apellidosPadre" class="form-control form-control-sm" value="{{ $miembros->apellidosPadre }}">
                                </div>
                            </div>
                            <div class="col-4">
                                <label for="exampleInputEmail1">Contacto</label>
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-address-card"></i></span>
                                    <input type="text" name="contactoPadre" id="contactoPadre" class="form-control form-control-sm" value="{{ $miembros->contactoPadre }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <label for="exampleInputEmail1">Madre</label>
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-user-o"></i></i></span>
                                    <input type="text" name="nombreMadre" id="nombreMadre" class="form-control form-control-sm" value="{{ $miembros->nombreMadre }}">
                                </div>
                            </div>
                            <div class="col-5">
                                <label for="exampleInputEmail1">Apellidos</label>
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-caret-right"></i></span>
                                    <input type="text" name="apellidosMadre" id="apellidosMadre" class="form-control form-control-sm" value="{{ $miembros->apellidosMadre }}">
                                </div>
                            </div>
                            <div class="col-4">
                                <label for="exampleInputEmail1">Contacto</label>
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-address-card"></i></span>
                                    <input type="text" name="contactoMadre" id="contactoMadre" class="form-control form-control-sm" value="{{ $miembros->contactoMadre }}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button class="btn btn-info"><i class="fa fa-floppy-o"></i></button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        </form>
    </section>
</div>
    
@include('footer')

