<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKemajuansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kemajuan', function (Blueprint $table) {
            $table->id('id_kemajuan');
            $table->unsignedBigInteger('id_santri');
            $table->unsignedBigInteger('id_pengurus');
            $table->timestamp('tanggal');
            $table->string('status', '1');
            $table->foreign('id_santri')->references('id_santri')->on('santri');
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
        Schema::dropIfExists('kemajuan');
    }
}
