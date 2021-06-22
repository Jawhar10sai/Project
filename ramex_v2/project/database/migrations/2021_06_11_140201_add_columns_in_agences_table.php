<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsInAgencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('agences', function (Blueprint $table) {
            $table->string('adresse_agence',80)->nullable();
            $table->string('telephone_agence')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('agences', function (Blueprint $table) {
            $table->dropColumn('adresse_agence');
            $table->dropColumn('telephone_agence');
        });
    }
}
