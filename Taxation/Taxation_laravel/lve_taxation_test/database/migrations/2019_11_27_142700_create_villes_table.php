<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVillesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('villes', function (Blueprint $table) {
          $table->charset = 'utf8';
          $table->collation = 'utf8_general_ci';
            $table->bigInteger('VILLE_COD');
            $table->string('AGENCE_COD');
            $table->string('VILLE_LIB');
            $table->string('VILLE_TYP')->nullable();
            $table->smallInteger('DELAI')->nullable();
            $table->string('ZONE_COD')->nullable();
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
        Schema::dropIfExists('villes');
    }
}
