<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFramassagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('framassages', function (Blueprint $table) {
            $table->id();
            $table->string('Client');
            $table->integer('Lundi')->nullable();
            $table->integer('Mardi')->nullable();
            $table->integer('Mercredi')->nullable();
            $table->integer('Jeudi')->nullable();
            $table->integer('Vendredi')->nullable();
            $table->integer('Somme')->nullable();
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
        Schema::dropIfExists('framassages');
    }
}
