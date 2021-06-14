<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGlobstatisticsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('globstatistics', function (Blueprint $table) {
            $table->id();
            $table->string('commercial',40)->nullable();
            $table->string('client',40)->nullable();
            $table->string('secteur',40)->nullable();
            $table->integer('age_reel')->nullable();
            $table->integer('age_avec_0ramassage')->nullable();
            $table->integer('age_avec_3_5ramassage')->nullable();
            $table->string('nom_utilisateur')->nullable();
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
        Schema::dropIfExists('globstatistics');
    }
}
