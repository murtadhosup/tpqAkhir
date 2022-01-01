<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailPeransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_peran', function (Blueprint $table) {
            $table->id('id_detail_peran');
            $table->unsignedBigInteger('id_peran');
            $table->unsignedBigInteger('id_pengurus');
            $table->foreign('id_peran')->references('id_peran')->on('peran');
            $table->foreign('id_pengurus')->references('id_pengurus')->on('pengurus');
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
        Schema::dropIfExists('detail_peran');
    }
}
