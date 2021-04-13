@include('nav')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    
    </section>
        <!-- Main content -->
    <section class="content">
        <form action="/user" method="POST">        
            @csrf
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
                    <label for="category-select">Elija el club</label>
                    <select class="form-control form-control-sm" name="category" id="category-select">
                        <option value="">--Porfavor elija un club--</option>
                        @foreach ($clubs as $club)
                            <option value="{{ $club->nombreClub }}">{{ $club->nombreClub }}</option>    
                        @endforeach
                    </select>
                </div>
                <div class="col-6">
                    <label for="category-select">Elija la categoria</label>
                    <select class="form-control form-control-sm" name="category" id="category-select">
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
                        <input type="date" name="fechaNacimiento" id="fechaNacimiento" class="form-control form-control-sm" required>
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
                        <span class="input-group-text"><i class="fa fa-circle-thin"></i></span>
                        <select class="form-control form-control-sm" name="sexo" id="sexo" required>
                            <option selected>Seleccione</option>
                            <option value="femenino">Femenino</option>
                            <option value="masculino">Masculino</option>
                            <option value="otro">Otro</option>
                        </select>
                    </div>
                </div>
            </div>
            <br>
            <div class="flex flex-row-reverse">
                <button class="btn btn-info ">
                    <i class="fas fa-save"></i>
                    <span><p>Guardar</p></span>
                </button>
            </div>
        </form>

    </section>
</div>
    
@include('footer')