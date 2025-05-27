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
        Schema::create('tupoksi_tugas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tugas_id');
            $table->foreign('tugas_id')->references('id')->on('tugas')->onDelete('restrict');
            $table->unsignedBigInteger('tupoksi_id');
            $table->foreign('tupoksi_id')->references('id')->on('tupoksi')->onDelete('restrict');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tupoksi_tugas');
    }
};
