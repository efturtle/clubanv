<x-app-layout>
    <x-miembros-slot/>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <!-- Validation Errors -->
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />
                    <form action="{{ route('miembro.update', $miembro) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-6">
                                <label for="exampleInputEmail1">Nombre</label>
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-user-o"></i></span>
                                    <input type="text" name="nombre" id="nombre" class="form-control form-control-sm" value="{{ $miembro->user->name }}" required>
                                </div>
                            </div>
                            <div class="col-6">
                                <label for="club">Club</label>
                                    <select class="form-control form-control-sm" name="club_id" id="club_id">
                                        <option value="{{ $miembro->club_id }}">{{ $miembro->club->nombreClub }}</option>
                                        @foreach ($clubs as $club)
                                            <option value="{{ $club->id }}">{{ $club->nombreClub }}</option>
                                        @endforeach
                                    </select>
                            </div>
                            <div class="col-6">
                                <label for="category">Categoria</label>
                                <select class="form-control form-control-sm" name="category" id="category" required>
                                    <option value="{{ $miembro->category }}">
                                    @switch($miembro->category)
                                        @case(1)
                                            Aventureros
                                            @break
                                        @case(2)
                                            Conquistadores
                                            @break
                                        @case(3)
                                            Guias Mayores
                                            @break
                                        @default
                                            
                                    @endswitch
                                    </option>
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
                                    <input type="date" name="fechaNacimiento" id="fechaNacimiento" onchange="calcAge();" class="form-control form-control-sm" value="{{ $miembro->fechaNacimiento }}" required>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="edad" id="edad">
                        <div class="row">
                            <div class="col-8">
                                <label for="exampleInputEmail1">Direccion</label>
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-map-marker"></i></span>
                                    <input type="text" name="direccion" id="direccion" class="form-control form-control-sm" value="{{ $miembro->direccion }}" required>
                                </div>
                            </div>
                            <div class="col-4">
                                <label for="exampleInputEmail1">Provincia/Colonia</label>
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-bullseye"></i></span>
                                    <input type="text" name="provincia_colonia" id="provincia_colonia" class="form-control form-control-sm" value="{{ $miembro->provincia_colonia }}" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <label for="exampleInputEmail1">Código Postal</label>
                                <input type="text" name="codigoPostal" id="codigoPostal" class="form-control form-control-sm" value="{{ $miembro->codigoPostal }}" required>
                            </div>
                            <div class="col-3">
                                <label for="exampleInputEmail1">Estado</label>
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-flag"></i></span>
                                    <select class="form-control form-control-sm" name="estado" id="estado" required> 
                                        <option selected>{{ $miembro->estado }}</option>
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
                                    <input type="text" name="ciudad" id="ciudad" class="form-control form-control-sm" value="{{ $miembro->ciudad }}" required>
                                </div>
                            </div>
                            <div class="col-3">
                                <label for="exampleInputEmail1">Nacionalidad</label>
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-globe"></i></span>
                                    <input type="text" name="nacionalidad" id="nacionalidad" class="form-control form-control-sm" value="{{ $miembro->nacionalidad }}" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <label for="exampleInputEmail1">Tipo de sangre</label>
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-heartbeat"></i></span>
                                    <select class="form-control form-control-sm" name="tipoSangre" id="tipoSangre" required>
                                        <option selected>{{ $miembro->tipoSangre }}</option>
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
                                    <option selected>{{ $miembro->confirmaAlergias }}</option>
                                    <option value="si">Si</option>
                                    <option value="no">No</option>
                                    <option value="desconoce">Desconozco</option>
                                </select>
                            </div>
                            <div class="col-3">
                                <label for="exampleInputEmail1">¿Cuál?</label>
                                <input type="text" name="alergia" id="alergia" class="form-control form-control-sm" value="{{ $miembro->alergia }}" >
                            </div>
                            <div class="col-3">
                                <label for="exampleInputEmail1">Sexo</label>
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-circle-thin"></i></span>
                                    <select class="form-control form-control-sm" name="sexo" id="sexo" required>
                                        <option selected>{{ $miembro->sexo }}</option>
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
                                                <input type="text" name="nombrePadre" id="nombrePadre" class="form-control form-control-sm" value="{{ $miembro->nombrePadre }}">
                                            </div>
                                        </div>
                                        <div class="col-5">
                                            <label for="exampleInputEmail1">Apellidos</label>
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fa fa-caret-right"></i></span>
                                                <input type="text" name="apellidosPadre" id="apellidosPadre" class="form-control form-control-sm" value="{{ $miembro->apellidosPadre }}">
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <label for="exampleInputEmail1">Contacto</label>
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fa fa-address-card"></i></span>
                                                <input type="text" name="contactoPadre" id="contactoPadre" class="form-control form-control-sm" value="{{ $miembro->contactoPadre }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-3">
                                            <label for="exampleInputEmail1">Madre</label>
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fa fa-user-o"></i></i></span>
                                                <input type="text" name="nombreMadre" id="nombreMadre" class="form-control form-control-sm" value="{{ $miembro->nombreMadre }}">
                                            </div>
                                        </div>
                                        <div class="col-5">
                                            <label for="exampleInputEmail1">Apellidos</label>
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fa fa-caret-right"></i></span>
                                                <input type="text" name="apellidosMadre" id="apellidosMadre" class="form-control form-control-sm" value="{{ $miembro->apellidosMadre }}">
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <label for="exampleInputEmail1">Contacto</label>
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fa fa-address-card"></i></span>
                                                <input type="text" name="contactoMadre" id="contactoMadre" class="form-control form-control-sm" value="{{ $miembro->contactoMadre }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button class="bg-gray-800 text-white focus:outline-none hover:bg-gray-700 hover:shadow-none w-40 h-12">Enviar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>




<script type="text/javascript">
    function calcAge(){
        var date = new Date(document.getElementById("fechaNacimiento").value);
        var today = new Date();

        var timeDiff = Math.abs(today.getTime() - date.getTime());
        var age1 = Math.ceil(timeDiff / (1000 * 3600 * 24)) / 365;
        document.getElementById("edad").value = Math.floor(age1);
    }
</script>