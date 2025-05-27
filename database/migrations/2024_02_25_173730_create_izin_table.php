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
        Schema::create('izin', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('no_surat')->nullable()->default('null');
            $table->date('tgl_surat');
            $table->date('tgl_awal');
            $table->date('tgl_akhir');
            $table->string('alasan_izin')->nullable()->default('null');
            $table->string('jlh_hari')->nullable()->default('null');
            $table->string('jam')->nullable()->default('null');
            $table->string('jam_2')->nullable()->default('null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('izin');
    }
};
