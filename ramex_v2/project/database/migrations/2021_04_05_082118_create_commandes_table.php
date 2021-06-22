<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommandesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commandes', function (Blueprint $table) {
            $table->id();
            $table->string('num_ramasse');
            $table->dateTime('date_saisie');
            $table->string('nom_saisisseur');
            $table->string('etat');
            $table->string('canal_d_appel');
            $table->string('type');
            $table->string('source');
            $table->string('code_client');
            $table->string('nom_client');
            $table->string('agence_client');
            $table->string('secteur_client');
            $table->string('adresse_client');
            $table->string('code_benificiaire');
            $table->string('nom_benificiaire');
            $table->string('acces_poids_lourds');
            $table->integer('nbr_colis');
            $table->string('nature_colis');
            $table->string('mesure')->nullable();
            $table->dateTime('date_ramasse');
            $table->string('type_camion');
            $table->string('hayon');
            $table->string('commentaire')->nullable();
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
        Schema::dropIfExists('commandes');
    }
}
