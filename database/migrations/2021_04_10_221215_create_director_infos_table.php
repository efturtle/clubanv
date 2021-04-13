<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDirectorInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('director_infos', function (Blueprint $table) {
            $table->increments('id');
            $table->smallInteger('rol');
            $table->string('email');
            $table->string('club');
            $table->string('categoria');
            $table->string('direccion');
            $table->string('codigoPostal');
            $table->string('sexo');
            $table->string('tipoSangre');
            $table->string('nacionalidad');
            $table->string('estado');
            $table->string('ciudad');
            
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')
            ->references('id')
            ->on('users');           
            
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
        Schema::dropIfExists('director_infos');
    }
}
