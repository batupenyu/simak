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
        Schema::create('umpan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('project_id');
            $table->longText('umpan1')->nullable();
            $table->longText('umpan2')->nullable();
            $table->longText('umpan3')->nullable();
            $table->longText('umpan4')->nullable();
            $table->longText('umpan5')->nullable();
            $table->longText('umpan6')->nullable();
            $table->longText('umpan7')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('umpan');
    }
};
