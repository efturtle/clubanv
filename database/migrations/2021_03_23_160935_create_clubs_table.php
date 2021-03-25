<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClubsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clubs', function (Blueprint $table) {
            /* hacer privilegios con una migracion futura
            $table->integer('privilegio'); */
            //Realizar privilegios y ponerlo en este formulario.

            $table->bigIncrements('id');
            //$table->unsignedBigInteger('user_id');
            $table->string('nombreClub');
            $table->string('significado');
            $table->string('iglesia');
            $table->string('director');
            $table->string('subdirector')->nullable();
            $table->string('subdirectora')->nullable();
            $table->string('tesorero')->nullable();
            $table->string('secretario');
            $table->string('pastor');
            $table->string('anciano');
            $table->date('fechaAprobacion');        
            $table->integer('numeroVoto');
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
        Schema::dropIfExists('clubs');
    }

}
