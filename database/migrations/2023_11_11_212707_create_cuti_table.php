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
        Schema::create('cuti', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('no_telp')->nullable()->default('null');
            $table->string('no_surat')->nullable()->default('null');
            $table->date('tgl_surat');
            $table->date('tgl_awal');
            $table->date('tgl_akhir');
            $table->string('alasan_cuti')->nullable()->default('null');
            $table->string('jlh_hari')->nullable()->default('null');
            $table->enum('jenis_cuti', ['Cuti Tahunan', 'Cuti Besar', 'Cuti Sakit', 'Cuti Melahirkan', 'Cuti Alasan Penting', 'Cuti Diluar Tanggungan Negara']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cuti');
    }
};
