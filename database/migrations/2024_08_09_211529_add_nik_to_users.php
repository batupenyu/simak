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
        Schema::table('users', function (Blueprint $table) {
            //
            $table->string('nik')->nullable();
            $table->string('kabupaten')->nullable();
            $table->string('kecamatan')->nullable();
            $table->string('desa_kelurahan')->nullable();
            $table->enum('sertifikasi',['sertifikasi','nonsertifikasi']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
            $table->dropColumn('nik');
            $table->dropColumn('kabupaten');
            $table->dropColumn('kecamatan');
            $table->dropColumn('desa_kelurahan');
            $table->dropColumn('sertifikasi');
        });
    }
};
