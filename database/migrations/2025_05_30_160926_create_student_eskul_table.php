<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('student_eskul', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_id')->nullable();
            $table->unsignedBigInteger('extracurricular_id')->nullable();
            $table->timestamps();

            $table->foreign('student_id')->references('id')->on('student')->onDelete('cascade');
            $table->foreign('extracurricular_id')->references('id')->on('extracurricular')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('student_eskul');
    }
};
