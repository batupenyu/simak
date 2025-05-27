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
            $table->enum('aspek', ['Kuantitas', 'Kualitas', 'Waktu'])->after('indikator')->default('Kuantitas');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tuti', function (Blueprint $table) {
            //
            $table->dropColumn('aspek');
        });
    }
};
