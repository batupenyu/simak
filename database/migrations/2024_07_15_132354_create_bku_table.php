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
        Schema::create('bku', function (Blueprint $table) {
            $table->id();
            $table->date('tgl_transaksi')->nullable();
            $table->string('kode_rek')->nullable();
            $table->string('no_bukti')->nullable();
            $table->string('uraian')->nullable();
            $table->enum('type',['saldobank','penerimaan','pengeluaran']);
            $table->bigInteger('nominal')->nullable();
            // $table->bigInteger('saldobank')->nullable();
            // $table->bigInteger('penerimaan')->nullable();
            // $table->bigInteger('pengeluaran')->nullable();
            $table->string('ntpn')->nullable();
            $table->bigInteger('pemotongan')->nullable();
            $table->bigInteger('penyetoran')->nullable();
            $table->bigInteger('volume')->nullable();
            $table->bigInteger('satuan')->nullable();
            $table->bigInteger('harga_satuan')->nullable();
            $table->bigInteger('pendapatan')->nullable();
            $table->bigInteger('belanja')->nullable();
            $table->bigInteger('sisa_pagu')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bku');
    }
};
