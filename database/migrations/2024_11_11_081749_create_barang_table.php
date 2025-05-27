<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('barang', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('nomor')->nullable();
            $table->date('tgl_awal');
            $table->date('tgl_akhir');
            $table->string('jenis')->nullable();
            $table->string('type')->nullable();
            $table->string('tahun')->nullable();
            $table->string('spek')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barang');

    }
};
