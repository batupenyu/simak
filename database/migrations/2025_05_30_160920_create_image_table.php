<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('image', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pists_id')->nullable();
            $table->string('image')->nullable();
            $table->timestamps();

            $table->foreign('pists_id')->references('id')->on('pists')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('image');
    }
};
