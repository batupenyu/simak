<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('student', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('gender')->nullable();
            $table->string('nis')->nullable();
            $table->unsignedBigInteger('class_id')->nullable();
            $table->timestamps();

            $table->foreign('class_id')->references('id')->on('class')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('student');
    }
};
