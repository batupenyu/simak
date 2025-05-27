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
        Schema::create('tim', function (Blueprint $table) {
            $table->id();
            $table->longText('name');
            $table->longText('indikator');
            $table->foreignId('rk_id');
            $table->foreignId('penilai_id');
            $table->string('anggota');
            $table->timestamps();
            // $table->unsignedBigInteger('rk_id');
            // $table->foreign('rk_id')->references('id')->on('rk')->onDelete('cascade');
            // $table->unsignedBigInteger('penilai_id');
            // $table->foreign('penilai_id')->references('id')->on('penilai')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tim');
    }
};
