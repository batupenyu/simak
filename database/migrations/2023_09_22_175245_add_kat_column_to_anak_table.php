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
        Schema::table('anak', function (Blueprint $table) {
            //
            $table->enum('kat',['1','2'])->after('name');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('anak', function (Blueprint $table) {
            //
            $table->dropColumn('kat');
        });
    }
};
