<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeclarationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('declarations', function (Blueprint $table) {
            $table->charset = 'utf8';
            $table->collation = 'utf8_general_ci';
            $table->string('courrier_num');
            $table->string('courrier_id')->nullable();
            $table->string('courrier_typ');
            $table->string('courrier_etat');
            #déclaration type: saisie depuis  VFW, Ramex, Mobile...
            $table->string('declaration_type');
            $table->dateTime('date_livraison');
            $table->integer('client1_id');
            $table->integer('client2_id');
            $table->integer('id_adres_exp');
            $table->integer('id_adres_dest');
            $table->char('express', 5);
            $table->char('livraison', 5)->nullable();
            $table->char('port', 5);
            $table->integer('colis');
            $table->decimal('poids', 8, 2);
            $table->decimal('longueur', 8, 2)->nullable();
            $table->decimal('hauteur', 8, 2)->nullable();
            $table->decimal('largeur', 8, 2)->nullable();
            $table->decimal('coef', 8, 2)->nullable();
            $table->decimal('valeur', 24, 2);
            $table->string('nature')->nullable();
            $table->string('nature')->nullable();
            $table->string('statut')->nullable();
            $table->string('statut_livraison')->nullable();
            $table->string('commentaire')->nullable();
            $table->integer('userid');
            $table->integer('retour_fonds_num')->nullable();
            $table->integer('retour_palettes_num')->nullable();
            $table->string('facture_id')->nullable();

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
        Schema::dropIfExists('declarations');
    }
}
