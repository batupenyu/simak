<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pists', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('penilai_id');
            $table->string('path_bukti_pengajuan');
            $table->string('no_surat');
            $table->date('tgl_surat');
            $table->date('tgl_surat_dasar');
            $table->string('asal_surat');
            $table->string('no_asal_surat');
            $table->text('description');
            $table->string('maksud');
            $table->string('tujuan');
            $table->string('acara');
            $table->text('ulasan');
            $table->string('photo');
            $table->date('tgl_awal');
            $table->date('tgl_akhir');
            $table->json('cat');
            $table->boolean('selected');
            $table->string('jam_1');
            $table->string('jam_2');
            $table->string('tempat');
            $table->timestamps();

            $table->foreign('penilai_id')->references('id')->on('penilai')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pists');
    }
}
