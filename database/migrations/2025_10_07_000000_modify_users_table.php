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
        Schema::table('users', function (Blueprint $table) {
            if (!Schema::hasColumn('users', 'atasan_id')) {
                $table->unsignedBigInteger('atasan_id')->nullable()->after('id');
                $table->foreign('atasan_id')->references('id')->on('atasan')->onDelete('set null');
            }
            if (!Schema::hasColumn('users', 'penilai_id')) {
                $table->unsignedBigInteger('penilai_id')->nullable()->after('atasan_id');
                $table->foreign('penilai_id')->references('id')->on('penilai')->onDelete('set null');
            }
            if (!Schema::hasColumn('users', 'pasangan_id')) {
                $table->unsignedBigInteger('pasangan_id')->nullable()->after('penilai_id');
                $table->foreign('pasangan_id')->references('id')->on('pasangan')->onDelete('set null');
            }
            if (!Schema::hasColumn('users', 'project_id')) {
                $table->unsignedBigInteger('project_id')->nullable()->after('pasangan_id');
                $table->foreign('project_id')->references('id')->on('projects')->onDelete('set null');
            }
            if (!Schema::hasColumn('users', 'email')) {
                $table->string('email')->unique()->after('name');
            }
            // Add other columns as needed similarly
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            if (Schema::hasColumn('users', 'atasan_id')) {
                $table->dropForeign(['atasan_id']);
                $table->dropColumn('atasan_id');
            }
            if (Schema::hasColumn('users', 'penilai_id')) {
                $table->dropForeign(['penilai_id']);
                $table->dropColumn('penilai_id');
            }
            if (Schema::hasColumn('users', 'pasangan_id')) {
                $table->dropForeign(['pasangan_id']);
                $table->dropColumn('pasangan_id');
            }
            if (Schema::hasColumn('users', 'project_id')) {
                $table->dropForeign(['project_id']);
                $table->dropColumn('project_id');
            }
            if (Schema::hasColumn('users', 'email')) {
                $table->dropColumn('email');
            }
            // Drop other columns as needed similarly
        });
    }
};
