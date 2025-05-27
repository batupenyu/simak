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
        Schema::create('pasangan', function (Blueprint $table) {
            $table->id();
            $table->integer('project_id');
            $table->integer('user_id');
            $table->string('name');
            $table->date('tgl_lahir');
            $table->date('tgl_kawin');
            $table->string('job');
            $table->string('net');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pasangan');
    }
};
