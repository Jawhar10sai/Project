<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsInStatisticsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('statistics', function (Blueprint $table) {
            $table->integer('age_avec_3_5ramassage')->nullable();
            $table->string('nom_fichier_age_3_5ram')->nullable();
            $table->integer('somme')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('statistics', function (Blueprint $table) {
            $table->dropColumn('age_avec_3_5ramassage');
            $table->dropColumn('nom_fichier_age_3_5ram');
            $table->dropColumn('somme');
        });
    }
}
