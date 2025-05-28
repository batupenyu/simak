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
        // Drop the pists table if it exists
        Schema::dropIfExists('pists');

        // Recreate the pists table with updated schema
        Schema::create('pists', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->text('description')->nullable();
            $table->string('ulasan')->nullable();
            $table->string('image')->nullable();
            $table->string('maksud')->nullable();
            $table->string('tujuan')->nullable();
            $table->string('path_bukti_pengajuan')->nullable();
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
