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
            $table->string('numero');
            $table->string('facture_id')->nullable();
            $table->integer('colis');
            $table->decimal('poids', 8, 2);
            $table->integer('palettes')->nullable();
            $table->integer('paletteA')->nullable();
            $table->integer('paletteB')->nullable();
            $table->integer('paletteC')->nullable();
            $table->integer('paletteAutre')->nullable();
            $table->integer('Nbre_palettes')->nullable();
            $table->decimal('longueur', 8, 2)->nullable();
            $table->decimal('hauteur', 8, 2)->nullable();
            $table->decimal('largeur', 8, 2)->nullable();
            $table->decimal('coef', 8, 2)->nullable();
            $table->decimal('valeur', 24, 2);
            $table->integer('client1_id');
            $table->integer('client2_id');
            $table->char('livraison', 5)->nullable();
            $table->char('express', 5);
            $table->char('port', 5);
            $table->char('courrier_typ', 5);
            $table->char('courrier_eta', 5);
            $table->integer('userid');
            $table->string('nature')->nullable();
            $table->decimal('Espece', 16, 2)->nullable();
            $table->decimal('Cheque', 16, 2)->nullable();
            $table->decimal('Traite', 16, 2)->nullable();
            $table->integer('Nbre_BL')->nullable();
            $table->string('BL')->nullable();
            $table->integer('id_adres');
            $table->string('statut')->nullable();
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
        Schema::dropIfExists('declarations');
    }
}
