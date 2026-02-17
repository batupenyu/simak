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
        Schema::table('angka_kredit', function (Blueprint $table) {
            $table->index('user_id');
            $table->index('penilai_id');
            $table->index('tgl_akhir_penilaian');
            $table->index(['user_id', 'tgl_akhir_penilaian']);
            $table->index(['user_id', 'tgl_awal_penilaian']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('angka_kredit', function (Blueprint $table) {
            $table->dropIndex(['user_id']);
            $table->dropIndex(['penilai_id']);
            $table->dropIndex(['tgl_akhir_penilaian']);
            $table->dropIndex(['user_id', 'tgl_akhir_penilaian']);
            $table->dropIndex(['user_id', 'tgl_awal_penilaian']);
        });
    }
};
