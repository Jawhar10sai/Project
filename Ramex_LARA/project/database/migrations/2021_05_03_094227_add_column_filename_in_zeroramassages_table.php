<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnFilenameInZeroramassagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('zeroramassages', function (Blueprint $table) {
            $table->string('nom_fichier')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('zeroramassages', function (Blueprint $table) {
            $table->dropColumn('nom_fichier');
        });
    }
}
