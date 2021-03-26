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
            $table->string('correo');
            $table->string('usuario');
            $table->string('contraseña');
            $table->date('fechaNacimiento');
            $table->string('direccion');
            $table->string('provincia_colonia');
            $table->string('codigoPostal');
            $table->string('nacionalidad');
            $table->string('estado');
            $table->string('ciudad');
            $table->string('tipoSangre');
            $table->boolean('alergias');
            $table->string('cuales');
            $table->string('sexo');
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
