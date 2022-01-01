<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailKemajuansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_kemajuan', function (Blueprint $table) {
            $table->id('id_detail_kemajuan');
            $table->unsignedBigInteger('id_kemajuan');
            $table->unsignedBigInteger('id_bab');
            $table->text('keterangan');
            $table->foreign('id_kemajuan')->references('id_kemajuan')->on('kemajuan');
            $table->foreign('id_bab')->references('id_bab')->on('bab');
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
        Schema::dropIfExists('detail_kemajuan');
    }
}
