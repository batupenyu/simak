<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tupoksi_tugas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tupoksi_id')->nullable()->constrained('tupoksi')->onDelete('cascade');
            $table->foreignId('tugas_id')->nullable()->constrained('tugas')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tupoksi_tugas');
    }
};
