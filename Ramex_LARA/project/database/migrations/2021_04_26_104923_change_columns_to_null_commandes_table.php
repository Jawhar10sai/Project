<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeColumnsToNullCommandesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('commandes', function (Blueprint $table) {
            $table->string('canal_d_appel')->nullable()->change();
            $table->string('type')->nullable()->change();
            $table->string('source')->nullable()->change();
            $table->string('code_client')->nullable()->change();
            $table->string('nom_client')->nullable()->change();
            $table->string('agence_client')->nullable()->change();
            $table->string('secteur_client')->nullable()->change();
            $table->string('adresse_client')->nullable()->change();
            $table->string('code_benificiaire')->nullable()->change();
            $table->string('nom_benificiaire')->nullable()->change();
            $table->string('acces_poids_lourds')->nullable()->change();
            $table->integer('nbr_colis')->nullable()->change();
            $table->string('nature_colis')->nullable()->change();
        
            $table->dateTime('date_ramasse')->nullable()->change();
            $table->string('type_camion')->nullable()->change();
            $table->string('hayon')->nullable()->change();
          
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('commandes', function (Blueprint $table) {
            $table->string('canal_d_appel')->change();
            $table->string('type')->change();
            $table->string('source')->change();
            $table->string('code_client')->change();
            $table->string('nom_client')->change();
            $table->string('agence_client')->change();
            $table->string('secteur_client')->change();
            $table->string('adresse_client')->change();
            $table->string('code_benificiaire')->change();
            $table->string('nom_benificiaire')->change();
            $table->string('acces_poids_lourds')->change();
            $table->integer('nbr_colis')->change();
            $table->string('nature_colis')->change();
        
            $table->dateTime('date_ramasse')->change();
            $table->string('type_camion')->change();
            $table->string('hayon')->change();
        });
    }
}
