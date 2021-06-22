<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeColumnsToNullInClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('clients', function (Blueprint $table) {
            $table->string('code_client', 50)->nullable()->change();
            $table->string('nom_client', 50)->nullable()->change();
            $table->string('agence_client', 50)->nullable()->change();
            $table->string('secteur_client', 50)->nullable()->change();
            $table->string('commercial_client', 50)->nullable()->change();
            $table->string('adresse_client', 50)->nullable()->change();
            $table->string('date_de_creation', 50)->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('clients', function (Blueprint $table) {
            //
        });
    }
}
