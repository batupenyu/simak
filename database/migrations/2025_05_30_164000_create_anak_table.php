<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnakTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anak', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('pasangan_id');
            $table->string('name');
            $table->date('tgl_lahir');
            $table->string('anak');
            $table->string('perkawinan');
            $table->string('status_sekolah');
            $table->string('status_beasiswa');
            $table->date('tgl_meninggal_cerai')->nullable();
            $table->string('pekerjaan');
            $table->string('kat');
            $table->timestamps();

            // Foreign key constraints can be added if referenced tables exist
            // $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            // $table->foreign('pasangan_id')->references('id')->on('pasangan')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('anak');
    }
}
