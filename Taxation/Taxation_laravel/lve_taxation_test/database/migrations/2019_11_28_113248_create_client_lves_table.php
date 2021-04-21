<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientLvesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client_lves', function (Blueprint $table) {
          $table->charset = 'utf8';
          $table->collation = 'utf8_general_ci';
          $table->bigIncrements('CLIENT_ID');
          $table->string('CLIENT_COD');
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
          $table->string('CLIENT_COD2');
          $table->integer('debinterval')->default(0);
          $table->integer('fininterval')->default(0);
          $table->integer('intervalag_deb')->default(0);
          $table->integer('intervalag_fin')->default(0);
          $table->string('commentaire')->nullable();
          $table->string('mail');
          $table->string('ICE')->nullable();
          $table->string('adresse');
          $table->string('ville');
          $table->string('telephone');
          $table->string('login');
          $table->string('mot_de_passe');
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
        Schema::dropIfExists('client_lves');
    }
}
