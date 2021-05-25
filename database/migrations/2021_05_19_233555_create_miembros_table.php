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
            $table->increments('id');
            $table->integer('category');
            $table->date('fechaNacimiento');
            $table->integer('edad');
            $table->string('direccion');
            $table->string('provincia_colonia');
            $table->string('codigoPostal');
            $table->string('estado');
            $table->string('ciudad');
            $table->string('nacionalidad');
            $table->string('tipoSangre');
            $table->string('confirmaAlergias');
            $table->string('alergia')->nullable();
            $table->string('sexo');

            $table->string('nombrePadre')->nullable();
            $table->string('apellidosPadre')->nullable();
            $table->string('contactoPadre')->nullable();
            $table->string('nombreMadre')->nullable();
            $table->string('apellidosMadre')->nullable();
            $table->string('contactoMadre')->nullable();


            /* Relationship with the users table */
            $table->foreignId('user_id')->constrained();
            $table->foreignId('club_id')->constrained();

            /* Datos del Conq./Aventurero */
                $table->string('iglesia')->nullable();
                $table->string('clasePorCursar')->nullable();
                $table->string('ultimaClaseCursada')->nullable();
                $table->string('investidoUtimaClase')->nullable();
                $table->boolean('bautizado')->nullable();

                /* aqui tengo que guardar la variable de lo que curso asi, este queda registrado en la base de datos. */

            /* Privilegio: si es 3 este es un aspirante o consejero */
            //$table->smallInteger('privilegio');

            /* Datos del consejero/aspirante */
            $table->boolean('investido')->nullable();
            $table->smallInteger('tipoAspirante_consejero')->nullable();
            $table->date('fechaInvestidura')->nullable();
            $table->integer('tiempoServicio')->nullable();



            /* Ficha tecnica */
                $table->string('nombreCurso')->nullable();
                $table->string('cursoActual')->nullable();
                $table->string('libros')->nullable();
                $table->string('especialidad')->nullable();
                $table->string('estatus')->nullable();
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
