<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->string('CLIENT_ID');
            $table->string('NOM');
            $table->string('PRENOM')->nullable();
            $table->string('CIVILITE_COD')->nullable();
            $table->string('CLIENT_TYP')->nullable();
            $table->string('IDENTITE_TYP')->default('de');
            $table->string('IDENTITE_VAL')->nullable();
            $table->string('ID_FISCALE')->nullable();
            $table->decimal('CAPITAL_SOC',50,0)->nullable();
            $table->string('CLIENT_ETA')->nullable();
            $table->integer('MOTIF_ETA')->nullable();
            $table->string('SECTEUR_COD')->nullable();
            $table->integer('EMPLOYE_ID')->nullable();
            $table->string('AGENCE_COD')->nullable();
            $table->string('CLIENT_COD');
            $table->string('commentaire')->nullable();
            $table->string('mail');
            $table->string('ICE')->nullable();
            $table->integer('CLIENT_ID_client_lve');
            $table->string('telephone');
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
        Schema::dropIfExists('clients');
    }
}
