<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsHistoriquesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients_historiques', function (Blueprint $table) {
            $table->id();
            $table->integer('id_client')->nullable();
            $table->string('code_client')->nullable();
            $table->string('nom_client')->nullable();
            $table->string('agence_client')->nullable();
            $table->string('secteur_client')->nullable();
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
        Schema::dropIfExists('clients_historiques');
    }
}
