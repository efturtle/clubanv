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
            $table->id();
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
            $table->date('fechaAprobacion')->nullable();        
            $table->integer('numeroVoto')->nullable();
            $table->string('foto')->nullable();
            /* $table->string('catConquistadores')->nullable();
            $table->string('catAventureros')->nullable();
            $table->string('catGuias')->nullable(); */

            $table->unsignedBigInteger('distrito_id');
            $table->foreign('distrito_id')
            ->references('id')
            ->on('clubs');
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
