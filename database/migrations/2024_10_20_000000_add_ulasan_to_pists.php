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
        if (Schema::hasTable('pists') && !Schema::hasColumn('pists', 'ulasan')) {
            Schema::table('pists', function (Blueprint $table) {
                $table->string('ulasan')->nullable()->after('id');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasTable('pists') && Schema::hasColumn('pists', 'ulasan')) {
            Schema::table('pists', function (Blueprint $table) {
                $table->dropColumn('ulasan');
            });
        }
    }
};
