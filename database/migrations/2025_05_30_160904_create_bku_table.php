<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('bku', function (Blueprint $table) {
            $table->id();
            $table->date('tgl_transaksi')->nullable();
            $table->string('kode_rek')->nullable();
            $table->string('no_bukti')->nullable();
            $table->text('uraian')->nullable();
            $table->string('type')->nullable();
            $table->decimal('nominal', 15, 2)->nullable();
            $table->string('ntpn')->nullable();
            $table->decimal('pemotongan', 15, 2)->nullable();
            $table->decimal('penyetoran', 15, 2)->nullable();
            $table->string('volume')->nullable();
            $table->string('satuan')->nullable();
            $table->decimal('harga_satuan', 15, 2)->nullable();
            $table->decimal('pendapatan', 15, 2)->nullable();
            $table->decimal('belanja', 15, 2)->nullable();
            $table->decimal('sisa_pagu', 15, 2)->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('bku');
    }
};
