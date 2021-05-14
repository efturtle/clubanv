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
            $table->bigIncrements('id');
            $table->string('nombreClub');
            $table->string('significado');
            $table->string('iglesia');
            $table->string('subdirector')->nullable();
            $table->string('subdirectora')->nullable();
            $table->string('tesorero')->nullable();
            $table->string('secretario');
            $table->string('anciano');
            $table->date('fechaAprobacion')->nullable();        
            $table->integer('numeroVoto')->nullable();
            $table->string('foto')->nullable();

            $table->unsignedBigInteger('distrito_id');
            $table->foreign('distrito_id')
            ->references('id')
            ->on('clubs');


            $table->unsignedBigInteger('director_id')->nullable();
            $table->foreign('director_id')
            ->references('id')
            ->on('users')->onDelete('set null');

            $table->unsignedBigInteger('pastor_id')->nullable();
            $table->foreign('pastor_id')
            ->references('id')
            ->on('users')->onDelete('set null');

            $table->unsignedBigInteger('directorAventurero_id')->nullable();
            $table->foreign('directorAventurero_id')
            ->references('id')
            ->on('users')->onDelete('set null');

            $table->unsignedBigInteger('directorConquistador_id')->nullable();
            $table->foreign('directorConquistador_id')
            ->references('id')
            ->on('users')->onDelete('set null');

            $table->unsignedBigInteger('directorGuiasMayores_id')->nullable();
            $table->foreign('directorGuiasMayores_id')
            ->references('id')
            ->on('users')->onDelete('set null');
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
