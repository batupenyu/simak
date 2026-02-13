<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('eks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->text('eks1')->nullable();
            $table->text('eks2')->nullable();
            $table->text('eks3')->nullable();
            $table->text('eks4')->nullable();
            $table->text('eks5')->nullable();
            $table->text('eks6')->nullable();
            $table->text('eks7')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('eks');
    }
};
