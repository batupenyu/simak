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
            $table->unsignedBigInteger('pasangan_id')->nullable();
            $table->string('name');
            $table->date('tgl_lahir');
            $table->string('anak')->nullable();
            $table->string('perkawinan')->nullable();
            $table->string('status_sekolah')->nullable();
            $table->string('status_beasiswa')->nullable();
            $table->date('tgl_meninggal_cerai')->nullable();
            $table->string('pekerjaan')->nullable();
            $table->string('kat')->nullable();
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
