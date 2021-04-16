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
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')
            ->references('id')
            ->on('users');
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
            $table->string('catConquistadores')->nullable();
            $table->string('catAventureros')->nullable();
            $table->string('catGuias')->nullable();
            
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
