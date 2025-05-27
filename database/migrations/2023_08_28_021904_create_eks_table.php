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
        Schema::create('eks', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('project_id');
            $table->text('eks1');
            $table->text('eks2');
            $table->text('eks3');
            $table->text('eks4');
            $table->text('eks5');
            $table->text('eks6');
            $table->text('eks7');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('eks');
    }
};
