<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateZeroramassagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('zeroramassages', function (Blueprint $table) {
            $table->id();
            $table->string('commercial');
            $table->string('client');
            $table->integer('age_reel')->nullable();
            $table->integer('age_avec_0ramassage')->nullable();
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
        Schema::dropIfExists('zeroramassages');
    }
}
