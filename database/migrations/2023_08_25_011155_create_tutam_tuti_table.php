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
        Schema::create('tutam_tuti', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tutam_id');
            $table->foreign('tutam_id')->references('id')->on('tutam')->onDelete('restrict');
            $table->unsignedBigInteger('tuti_id');
            $table->foreign('tuti_id')->references('id')->on('tuti')->onDelete('restrict');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tutam_tuti');
    }
};
