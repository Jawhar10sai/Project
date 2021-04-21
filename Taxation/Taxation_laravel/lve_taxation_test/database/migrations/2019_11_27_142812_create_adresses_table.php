<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adresses', function (Blueprint $table) {
          $table->charset = 'utf8';
          $table->collation = 'utf8_general_ci';
            $table->bigIncrements('id_adresse');
            $table->string('lib_adresse');
            $table->bigInteger('id_client');
            $table->bigInteger('id_user');
            $table->bigInteger('id_ville');
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
        Schema::dropIfExists('adresses');
    }
}
