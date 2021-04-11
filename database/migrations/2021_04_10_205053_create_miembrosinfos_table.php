<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMiembrosinfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('miembrosinfos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre_completo');
            $table->date('fecha_nacimiento');
            $table->smallInteger('edad');
            $table->string('direccion');
            $table->string('codigoPostal');
            $table->string('sexo');
            $table->string('tipoSangre');
            $table->string('confirmaAlergias');
            $table->string('alergia')->nullable();
            $table->string('nacionalidad');
            $table->string('estado');
            $table->string('ciudad');


            /* Relationship with the users table */
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')
            ->references('id')
            ->on('users');


            /* $table->string('nombrePadre');
            $table->string('apellidosPadre');
            $table->string('contactoPadre');
            $table->string('nombreMadre');
            $table->string('apellidosMadre');
            $table->string('contactoMadre'); */



            /* Datos del Conq./Aventurero */
                /* $table->string('iglesia');
                $table->string('distrito');
                $table->string('clase_por_cursar');
                $table->string('ultima_clase_cursada');
                $table->string('investido_en_la_ultima_clase');
                $table->boolean('bautizado'); */

                /* aqui tengo que guardar la variable de lo que curso asi, este queda registrado en la base de datos. */

            /* Privilegio: si es 3 este es un aspirante o consejero */
            //$table->smallInteger('privilegio');    

            /* Datos del consejero/aspirante */
            /* $table->boolean('bautizado');
            $table->string('iglesia');
            $table->string('distrito');
            $table->boolean('investido');
            $table->smallInteger('tipo_aspirante_consejero');
            $table->date('fecha_investidura');
            $table->integer('tiempo_de_servicio'); */



            /* Ficha tecnica */
                /* $table->string('nombre_c');
                $table->string('curso_actual');
                $table->string('libros');
                $table->string('especialidad');
                $table->string('estatus'); */
                
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
        Schema::dropIfExists('miembrosinfos');
    }
}
