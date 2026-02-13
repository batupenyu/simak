<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('class', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->unsignedBigInteger('guru_id')->nullable();
            $table->timestamps();

            $table->foreign('guru_id')->references('id')->on('guru')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('class');
    }
};
