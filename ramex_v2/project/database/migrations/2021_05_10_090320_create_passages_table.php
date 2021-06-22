<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePassagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('passages', function (Blueprint $table) {
            $table->id();
            $table->string('client',40)->nullable();
            $table->string('secteur',40)->nullable();
            $table->integer('s1')->nullable();
            $table->integer('s2')->nullable();
            $table->integer('s3')->nullable();
            $table->integer('s4')->nullable();
            $table->integer('s5')->nullable();
            $table->integer('total_passage')->nullable();
            $table->integer('cat_0')->nullable();
            $table->integer('cat_12')->nullable();
            $table->integer('cat_35')->nullable();
            $table->string('nom_utilisateur')->nullable();
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
        Schema::dropIfExists('passages');
    }
}
