<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('umpan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('cascade');
            $table->text('umpan1')->nullable();
            $table->text('umpan2')->nullable();
            $table->text('umpan3')->nullable();
            $table->text('umpan4')->nullable();
            $table->text('umpan5')->nullable();
            $table->text('umpan6')->nullable();
            $table->text('umpan7')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('umpan');
    }
};
