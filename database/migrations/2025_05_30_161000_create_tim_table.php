<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTimTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tim', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('rk_id');
            $table->text('indikator');
            $table->unsignedBigInteger('penilai_id');
            $table->json('anggota');
            $table->timestamps();

            // Foreign key constraints can be added if referenced tables exist
            // $table->foreign('rk_id')->references('id')->on('rk')->onDelete('cascade');
            // $table->foreign('penilai_id')->references('id')->on('penilai')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tim');
    }
}
