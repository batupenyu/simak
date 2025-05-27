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
        Schema::create('angka_kredit', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->date('tgl_awal_penilaian');
            $table->date('tgl_akhir_penilaian');
            $table->date('tgl_penetapan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('angka_kredit');
    }
};
