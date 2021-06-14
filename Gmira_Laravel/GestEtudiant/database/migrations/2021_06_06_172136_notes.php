<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Notes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        #in case the connection is in the second DB
             Schema::connection('mysql2')->create('inscriptions', function (Blueprint $table) {
            $table->id();
            $table->decimal('note_1');
            $table->decimal('note_2');
            $table->decimal('moyenne');
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
        //
    }
}
