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

    <script type="text/javascript">
        function calcAge(){
            var date = new Date(document.getElementById("fechaNacimiento").value);
            var today = new Date();

            var timeDiff = Math.abs(today.getTime() - date.getTime());
            var age1 = Math.ceil(timeDiff / (1000 * 3600 * 24)) / 365;

            
            document.getElementById("edad").value = Math.round(age1);
        }
    </script>

    <!-- The Modal -->
    <div class="modal fade" tabindex="-1" role="dialog" id="myModal" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <!-- Validation Errors -->
                <x-auth-validation-errors class="mb-4" :errors="$errors" />
                <form action="/miembro" method="POST">
                    @csrf
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title text-indigo-800">Datos Personales</h4>
                        <button type="button" class="close" data-dismiss="modal">×</button>
                    </div>
                    <!-- Modal body -->
                    <div class="modal-body modal-info">
                        <div class="row">
                            <div class="col-6">
                                <!-- Name -->
                                <div>
                                    <x-label for="name" :value="__('Name')" />
                
                                    <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
                                </div>
                            </div>
                            <div class="col-6">
                                <!-- Email Address -->
                                <div>
                                    <x-label for="email" :value="__('Email')" />
                
                                    <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <!-- Password -->
                                <div class="mt-4">
                                    <x-label for="password" :value="__('Password')" />
                
                                    <x-input id="password" class="block mt-1 w-full"
                                                    type="password"
                                                    name="password"
                                                    required autocomplete="new-password" />
                                </div>
                            </div>
                            <div class="col-6">
                                <!-- Confirm Password -->
                                <div class="mt-4">
                                    <x-label for="password_confirmation" :value="__('Confirm Password')" />
                
                                    <x-input id="password_confirmation" class="block mt-1 w-full"
                                                    type="password"
                                                    name="password_confirmation" required />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <label for="exampleInputEmail1">Nombre Completo</label>
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-signature"></i></span>
                                    <input type="text" name="nombre" id="nombre" class="form-control form-control-sm" placeholder="Inserte el nombre" required>
                                </div>
                            </div>
                        </div>    
                        <div class="row">
                            <div class="col-6">
                                <label for="club">Club</label>
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-signature"></i></span>
                                    <select class="form-control form-control-sm" name="club" id="club" required>
                                        <option value="">--Porfavor elija un club--</option>
                                        <option value="{{ Auth::user()->directorinfo->club }}">{{ Auth::user()->directorinfo->club }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <label for="category">Elija la categoria</label>
                                <select class="form-control form-control-sm" name="category" id="category" value="{{ old('category') }}" required>
                                    <option value="">--Porfavor elija una Categoria--</option>
                                    <option value="1">Aventuras</option>
                                    <option value="2">Conquistadores</option>
                                    <option value="3">Guias Mayores</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <label for="exampleInputEmail1">Fecha de nacimiento</label>
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                    <input type="date" name="fechaNacimiento" id="fechaNacimiento" onchange="calcAge();" class="form-control form-control-sm" required>
                                </div>
                            </div>
                            <div class="col-6">
                                <label for="exampleInputEmail1">Edad</label>
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                    <input type="number" name="edad" id="edad" class="form-control form-control-sm" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-8">
                                <label for="exampleInputEmail1">Direccion</label>
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-map-marker"></i></span>
                                    <input type="text" name="direccion" id="direccion" class="form-control form-control-sm" placeholder="Ejemplo: Calle, No.#" required>
                                </div>
                            </div>
                            <div class="col-4">
                                <label for="exampleInputEmail1">Provincia/Colonia</label>
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-bullseye"></i></span>
                                    <input type="text" name="provincia_colonia" id="provincia_colonia" class="form-control form-control-sm" placeholder="Ejemplo: Col. Tajín" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <label for="exampleInputEmail1">Código Postal</label>
                                <input type="text" name="codigoPostal" id="codigoPostal" class="form-control form-control-sm" placeholder="#####" required>
                            </div>
                            <div class="col-3">
                                <label for="exampleInputEmail1">Nacionalidad</label>
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-globe"></i></span>
                                    <input type="text" name="nacionalidad" id="nacionalidad" class="form-control form-control-sm" placeholder="" required>
                                </div>
                            </div>
                            <div class="col-3">
                                <label for="exampleInputEmail1">Estado</label>
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-flag"></i></span>
                                    <select class="form-control form-control-sm" name="estado" id="estado" required> 
                                        <option selected>Seleccione</option>
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
                                    <input type="text" name="ciudad" id="ciudad" class="form-control form-control-sm" placeholder="Ejemplo: Poza Rica" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <label for="exampleInputEmail1">Tipo de sangre</label>
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-heartbeat"></i></span>
                                    <select class="form-control form-control-sm" name="tipoSangre" id="tipoSangre" required>
                                        <option selected>Seleccione</option>
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
                                    <option selected>Seleccione</option>
                                    <option value="si">Si</option>
                                    <option value="no">No</option>
                                    <option value="desconoce">Desconozco</option>
                                </select>
                            </div>
                            <div class="col-3">
                                <label for="exampleInputEmail1">¿Cuál?</label>
                                <input type="text" name="alergia" id="alergia" class="form-control form-control-sm" placeholder="Describa el tipo de alergia" >
                            </div>
                            <div class="col-3">
                                <label for="exampleInputEmail1">Sexo</label>
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-genderless"></i></span>
                                    <select class="form-control form-control-sm" name="sexo" id="sexo" required>
                                        <option selected>Seleccione</option>
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
                                                <span class="input-group-text"><i class="fas fa-house-user"></i></span>
                                                <input type="text" name="nombrePadre" id="nombrePadre" class="form-control form-control-sm" placeholder="Inserte el nombre del padre">
                                            </div>
                                        </div>
                                        <div class="col-5">
                                            <label for="exampleInputEmail1">Apellidos</label>
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fa fa-caret-right"></i></span>
                                                <input type="text" name="apellidosPadre" id="apellidosPadre" class="form-control form-control-sm" placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <label for="exampleInputEmail1">Contacto</label>
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fa fa-address-card"></i></span>
                                                <input type="text" name="contactoPadre" id="contactoPadre" class="form-control form-control-sm" placeholder="Ejemplo: #5555550000">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-3">
                                            <label for="exampleInputEmail1">Madre</label>
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-house-user"></i></span>
                                                <input type="text" name="nombreMadre" id="nombreMadre" class="form-control form-control-sm" placeholder="Inserte el nombre de la madre">
                                            </div>
                                        </div>
                                        <div class="col-5">
                                            <label for="exampleInputEmail1">Apellidos</label>
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fa fa-caret-right"></i></span>
                                                <input type="text" name="apellidosMadre" id="apellidosMadre" class="form-control form-control-sm" placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <label for="exampleInputEmail1">Contacto</label>
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fa fa-address-card"></i></span>
                                                <input type="text" name="contactoMadre" id="contactoMadre" class="form-control form-control-sm" placeholder="Ejemplo: #5555550000">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="text-indigo-800">Datos Conquistador / Aventurero</h5>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-3">
                                            <label for="exampleInputEmail1">Iglesia</label>
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-house-user"></i></span>
                                                <input type="text" name="iglesia" id="iglesia" class="form-control form-control-sm" placeholder="Inserte el nombre del padre">
                                            </div>
                                        </div>
                                        <div class="col-5">
                                            <label for="exampleInputEmail1">Distrito</label>
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fa fa-caret-right"></i></span>
                                                <input type="text" name="distrito" id="distrito" class="form-control form-control-sm" placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <label for="exampleInputEmail1">Clase por Cursar</label>
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fa fa-address-card"></i></span>
                                                <input type="text" name="claseCursar" id="claseCursar" class="form-control form-control-sm" placeholder="Ejemplo: #5555550000">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-3">
                                            <label for="exampleInputEmail1">Ultima Clase Cursada</label>
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-house-user"></i></span>
                                                <input type="text" name="ultimaClase" id="ultimaClase" class="form-control form-control-sm" placeholder="Inserte el nombre de la madre">
                                            </div>
                                        </div>
                                        <div class="col-5">
                                            <label for="exampleInputEmail1">Investido en la ultima clase</label>
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fa fa-caret-right"></i></span>
                                                <input type="text" name="investidoClase" id="investidoClase" class="form-control form-control-sm" placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <label for="exampleInputEmail1">Bautizado</label>
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fa fa-address-card"></i></span>
                                                <input type="text" name="bautizado" id="bautizado" class="form-control form-control-sm" placeholder="Ejemplo: #5555550000">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="text-indigo-800">Datos Consejero / Aspirante</h5>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-3">
                                            <label for="exampleInputEmail1">Bautizado</label>
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-house-user"></i></span>
                                                <input type="text" name="bautizado" id="bautizado" class="form-control form-control-sm" placeholder="Inserte el nombre del padre">
                                            </div>
                                        </div>
                                        <div class="col-5">
                                            <label for="exampleInputEmail1">Iglesia</label>
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fa fa-caret-right"></i></span>
                                                <input type="text" name="iglesia" id="iglesia" class="form-control form-control-sm" placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <label for="exampleInputEmail1">Distrito</label>
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fa fa-address-card"></i></span>
                                                <input type="text" name="distrito" id="distrito" class="form-control form-control-sm" placeholder="Ejemplo: #5555550000">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-3">
                                            <label for="exampleInputEmail1">Investido</label>
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-house-user"></i></span>
                                                <input type="text" name="investido" id="investido" class="form-control form-control-sm" placeholder="Inserte el nombre de la madre">
                                            </div>
                                        </div>
                                        <div class="col-5">
                                            <label for="tipoAspirante">Aspirante o Consejero?</label>
                                            <select name="tipoAspirante" id="tipoAspirante" class="form-control form-control-sm">
                                                <option value="">--Please choose an option--</option>
                                                <option value="1">Aspirante</option>
                                                <option value="2">Consejero</option>
                                            </select>
                                        </div>
                                        <div class="col-4">
                                            <label for="exampleInputEmail1">Fecha de Investidura</label>
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fa fa-address-card"></i></span>
                                                <input type="text" name="fechaInvestidura" id="fechaInvestidura" class="form-control form-control-sm" placeholder="Ejemplo: #5555550000">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button class="btn btn-info"><i class="fa fa-save">Guardar</i></button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
