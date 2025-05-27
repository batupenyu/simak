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
        Schema::create('pists', function (Blueprint $table) {
            $table->id();
            $table->string('no_surat')->nullable()->default('null');
            $table->date('tgl_surat');
            $table->date('tgl_surat_dasar');
            $table->string('asal_surat');
            $table->string('no_asal_surat');
            $table->text('description');
            $table->date('tgl_awal');
            $table->date('tgl_akhir');
            $table->text('cat');
            $table->string('jam_1')->nullable()->default('null');
            $table->string('jam_2')->nullable()->default('null');
            $table->text('tempat');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pists');
    }
};
