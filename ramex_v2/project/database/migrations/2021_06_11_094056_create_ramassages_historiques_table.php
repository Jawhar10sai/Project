<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRamassagesHistoriquesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ramassages_historiques', function (Blueprint $table) {
            $table->id();
            $table->integer('id_ramasse')->nullable();
            $table->string('code_ramasse')->nullable();
            $table->string('action')->nullable();
            $table->dateTime('date_action')->nullable();
            $table->string('nom_user')->nullable();
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
        Schema::dropIfExists('ramassages_historiques');
    }
}
