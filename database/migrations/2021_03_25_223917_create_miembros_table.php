<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMiembrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('miembros', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('apellidos');
            $table->string('usuario');
            $table->string('clave');
            $table->date('fechaNacimiento');
            $table->string('direccion');
            $table->string('provincia_colonia');
            $table->string('codigoPostal');
            $table->string('nacionalidad');
            $table->string('estado');
            $table->string('ciudad');
            $table->string('tipoSangre');
            $table->string('confirmaAlergias');
            $table->string('alergia')->nullable();
            $table->string('sexo');
            $table->string('nombrePadre');
            $table->string('apellidosPadre');
            $table->string('contactoPadre');
            $table->string('nombreMadre');
            $table->string('apellidosMadre');
            $table->string('contactoMadre');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('miembros');
    }
}
