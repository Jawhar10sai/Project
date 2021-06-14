<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStatistics0ramsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('statistics0rams', function (Blueprint $table) {
            $table->id();
            $table->integer('age')->nullable();
            $table->integer('nbr_clients')->nullable();
            $table->float('pourcentage',8,2)->nullable();
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
        Schema::dropIfExists('statistics0rams');
    }
}
