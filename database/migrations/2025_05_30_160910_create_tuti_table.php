<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tuti', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('cascade');
            $table->foreignId('tutam_id')->nullable()->constrained('tutam')->onDelete('cascade');
            $table->text('indikator')->nullable();
            $table->string('aspek')->nullable();
            $table->string('target')->nullable();
            $table->string('satuan')->nullable();
            $table->string('realisasi')->nullable();
            $table->string('umpanbalik')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tuti');
    }
};
