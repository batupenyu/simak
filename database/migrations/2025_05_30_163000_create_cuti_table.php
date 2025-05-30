<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCutiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cuti', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('no_telp');
            $table->string('no_surat');
            $table->date('tgl_surat');
            $table->date('tgl_awal');
            $table->date('tgl_akhir');
            $table->date('tglmasuk');
            $table->text('alasan_cuti');
            $table->integer('jlh_hari');
            $table->string('jenis_cuti');
            $table->integer('tahun_1');
            $table->integer('tahun_2');
            $table->integer('tahun_3');
            $table->integer('sisa_1');
            $table->integer('sisa_2');
            $table->integer('sisa_3');
            $table->timestamps();

            // Foreign key constraint if users table exists
            // $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cuti');
    }
}
