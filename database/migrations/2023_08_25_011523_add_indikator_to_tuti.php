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
        Schema::table('tuti', function (Blueprint $table) {
            //
            $table->text('indikator');
            $table->string('target');
            $table->string('satuan');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tuti', function (Blueprint $table) {
            //
        });
    }
};
