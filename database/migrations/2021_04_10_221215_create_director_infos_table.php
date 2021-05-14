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
            $table->smallInteger('category')->nullable();
            $table->string('direccion')->nullable();
            $table->string('codigoPostal')->nullable();
            $table->string('sexo')->nullable();
            $table->string('tipoSangre')->nullable();
            $table->string('nacionalidad')->nullable();
            $table->string('estado')->nullable();
            $table->string('ciudad')->nullable();
            $table->softDeletes();

            $table->boolean('asignado')->default(0);

            $table->foreignId('user_id')->constrained();
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
