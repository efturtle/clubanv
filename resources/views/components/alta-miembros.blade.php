@if ($clubs->isEmpty())
    <p>No hay clubs actualmente, crear uno?</p>
    <a href="{{ route('clubes.crear') }}" class="bg-indigo-700 rounded-full px-3 py-1">
        <span class="text-white">Crear</span> 
    </a>
@else
    <script type="text/javascript">
        function calcAge(){
            var date = new Date(document.getElementById("fechaNacimiento").value);
            var today = new Date();

            var timeDiff = Math.abs(today.getTime() - date.getTime());
            var age1 = Math.ceil(timeDiff / (1000 * 3600 * 24)) / 365;
            document.getElementById("edad").value = Math.round(age1);
        }
    </script>
    <!-- Validation Errors -->
    <x-auth-validation-errors class="mb-4" :errors="$errors" />
    <form action="{{ route('miembro.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-6">
                <label for="exampleInputEmail1">Nombre Completo</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-signature"></i></span>
                    <input type="text" name="nombre" id="nombre" class="form-control form-control-sm" placeholder="Inserte el nombre" value="{{ old('nombre') }}" required>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <label for="club">Club</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-signature"></i></span>
                    <select class="form-control form-control-sm" name="club_id" id="club_id" required>
                        <option value="">--Porfavor elija un club--</option>
                        @foreach ($clubs as $club)
                            <option value="{{ $club->id }}">{{ $club->nombreClub }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-6">
                <label for="category">Elija la categoria</label>
                <select class="form-control form-control-sm" name="category" id="category" required>
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
                <div class="input-group">
                    <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                    <input type="date" name="fechaNacimiento" id="fechaNacimiento" onchange="calcAge();" class="form-control form-control-sm" value="{{ old('fechaNacimiento') }}" required>
                </div>
            </div>
            <div class="col-6">
                <label for="exampleInputEmail1">Edad</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                    <input type="number" name="edad" id="edad" class="form-control form-control-sm" value="{{ old('edad') }}" required>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-8">
                <label for="exampleInputEmail1">Direccion</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fa fa-map-marker"></i></span>
                    <input type="text" name="direccion" id="direccion" class="form-control form-control-sm" placeholder="Ejemplo: Calle, No.#" value="{{ old('direccion') }}" required>
                </div>
            </div>
            <div class="col-4">
                <label for="exampleInputEmail1">Provincia/Colonia</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fa fa-bullseye"></i></span>
                    <input type="text" name="provincia_colonia" id="provincia_colonia" class="form-control form-control-sm" placeholder="Ejemplo: Col. Tajín" value="{{ old('provincia_colonia') }}" required>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-3">
                <label for="exampleInputEmail1">Código Postal</label>
                <input type="text" name="codigoPostal" id="codigoPostal" class="form-control form-control-sm" placeholder="#####" value="{{ old('codigoPostal') }}" required>
            </div>
            <div class="col-3">
                <label for="exampleInputEmail1">Nacionalidad</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fa fa-globe"></i></span>
                    <input type="text" name="nacionalidad" id="nacionalidad" class="form-control form-control-sm" placeholder="" value="{{ old('nacionalidad') }}" required>
                </div>
            </div>
            <div class="col-3">
                <label for="exampleInputEmail1">Estado</label>
                <div class="input-group">
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
                <div class="input-group">
                    <span class="input-group-text"><i class="fa fa-building"></i></span>
                    <input type="text" name="ciudad" id="ciudad" class="form-control form-control-sm" placeholder="Ejemplo: Poza Rica" value="{{ old('ciudad') }}" required>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-3">
                <label for="exampleInputEmail1">Tipo de sangre</label>
                <div class="input-group">
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
                <input type="text" name="alergia" id="alergia" class="form-control form-control-sm" placeholder="Describa el tipo de alergia" value="{{ old('alergia') }}">
            </div>
            <div class="col-3">
                <label for="exampleInputEmail1">Sexo</label>
                <div class="input-group">
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
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-house-user"></i></span>
                                <input type="text" name="nombrePadre" id="nombrePadre" class="form-control form-control-sm" placeholder="Inserte el nombre del padre" value="{{ old('nombrePadre') }}">
                            </div>
                        </div>
                        <div class="col-5">
                            <label for="exampleInputEmail1">Apellidos</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fa fa-caret-right"></i></span>
                                <input type="text" name="apellidosPadre" id="apellidosPadre" class="form-control form-control-sm" placeholder="" value="{{ old('apellidosPadre') }}">
                            </div>
                        </div>
                        <div class="col-4">
                            <label for="exampleInputEmail1">Contacto</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fa fa-address-card"></i></span>
                                <input type="text" name="contactoPadre" id="contactoPadre" class="form-control form-control-sm" placeholder="Ejemplo: #5555550000" value="{{ old('contactoPadre') }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3">
                            <label for="exampleInputEmail1">Madre</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-house-user"></i></span>
                                <input type="text" name="nombreMadre" id="nombreMadre" class="form-control form-control-sm" placeholder="Inserte el nombre de la madre" value="{{ old('nombreMadre') }}">
                            </div>
                        </div>
                        <div class="col-5">
                            <label for="exampleInputEmail1">Apellidos</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fa fa-caret-right"></i></span>
                                <input type="text" name="apellidosMadre" id="apellidosMadre" class="form-control form-control-sm" placeholder="" value="{{ old('apellidosPadre') }}">
                            </div>
                        </div>
                        <div class="col-4">
                            <label for="exampleInputEmail1">Contacto</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fa fa-address-card"></i></span>
                                <input type="text" name="contactoMadre" id="contactoMadre" class="form-control form-control-sm" placeholder="Ejemplo: #5555550000" value="{{ old('contactoMadre') }}">
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
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-house-user"></i></span>
                                <input type="text" name="iglesia" id="iglesia" class="form-control form-control-sm" placeholder="Inserte el nombre del padre" value="{{ old('iglesia') }}">
                            </div>
                        </div>
                        <div class="col-5">
                            <label for="exampleInputEmail1">Distrito</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fa fa-caret-right"></i></span>
                                <input type="text" name="distrito" id="distrito" class="form-control form-control-sm" placeholder="" value="{{ old('distrito') }}">
                            </div>
                        </div>
                        <div class="col-4">
                            <label for="exampleInputEmail1">Clase por Cursar</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fa fa-address-card"></i></span>
                                <input type="text" name="claseCursar" id="claseCursar" class="form-control form-control-sm" placeholder="Ejemplo: #5555550000" value="{{ old('claseCursar') }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3">
                            <label for="exampleInputEmail1">Ultima Clase Cursada</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-house-user"></i></span>
                                <input type="text" name="ultimaClase" id="ultimaClase" class="form-control form-control-sm" placeholder="Inserte el nombre de la madre" value="{{ old('ultimaClase') }}">
                            </div>
                        </div>
                        <div class="col-5">
                            <label for="exampleInputEmail1">Investido en la ultima clase</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fa fa-caret-right"></i></span>
                                <input type="text" name="investidoClase" id="investidoClase" class="form-control form-control-sm" placeholder="" value="{{ old('investidoClase') }}">
                            </div>
                        </div>
                        <div class="col-4">
                            <label for="exampleInputEmail1">Bautizado</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fa fa-address-card"></i></span>
                                <input type="text" name="bautizado" id="bautizado" class="form-control form-control-sm" placeholder="Ejemplo: #5555550000" value="{{ old('bautizado') }}">
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
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-house-user"></i></span>
                                <input type="text" name="bautizado" id="bautizado" class="form-control form-control-sm" placeholder="Inserte el nombre del padre" value="{{ old('bautizado') }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3">
                            <label for="exampleInputEmail1">Investido</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-house-user"></i></span>
                                <input type="text" name="investido" id="investido" class="form-control form-control-sm" placeholder="Inserte el nombre de la madre" value="{{ old('investido') }}">
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
                            <div class="input-group">
                                <span class="input-group-text"><i class="fa fa-address-card"></i></span>
                                <input type="text" name="fechaInvestidura" id="fechaInvestidura" class="form-control form-control-sm" placeholder="Ejemplo: #5555550000" value="{{ old('fechaInvestidura') }}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex justify-end">
            <button class="bg-gray-800 text-white focus:outline-none hover:bg-gray-700 hover:shadow-none w-40 h-12">Enviar</button>
        </div>
        
    </form>
@endif