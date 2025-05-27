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
        Schema::table('izin', function (Blueprint $table) {
            $table->enum('pilih_izin',['PRESENSI SIDIK JARI','UPACARA ATAU OLAHRAGA','TIDAK MASUK KERJA'])->after('alasan_izin')->default('TIDAK MASUK KERJA');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('izin', function (Blueprint $table) {
            $table->dropColumn('pilih_izin');
        });
    }
};
