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
        // Add index to users.penilai_id for faster joins
        if (Schema::hasTable('users')) {
            Schema::table('users', function (Blueprint $table) {
                $table->index('penilai_id', 'idx_users_penilai_id');
            });
        }

        // Add index to users.pasangan_id for faster joins
        if (Schema::hasTable('users')) {
            Schema::table('users', function (Blueprint $table) {
                $table->index('pasangan_id', 'idx_users_pasangan_id');
            });
        }

        // Add index to penilai.user_id for faster joins (reverse relationship)
        if (Schema::hasTable('penilai')) {
            Schema::table('penilai', function (Blueprint $table) {
                $table->index('user_id', 'idx_penilai_user_id');
            });
        }

        // Add index to atasan.user_id for faster joins
        if (Schema::hasTable('atasan')) {
            Schema::table('atasan', function (Blueprint $table) {
                $table->index('user_id', 'idx_atasan_user_id');
            });
        }

        // Add index to tutam.user_id for faster joins
        if (Schema::hasTable('tutam')) {
            Schema::table('tutam', function (Blueprint $table) {
                $table->index('user_id', 'idx_tutam_user_id');
            });
        }

        // Add index to tutam.rk_id for faster joins
        if (Schema::hasTable('tutam')) {
            Schema::table('tutam', function (Blueprint $table) {
                $table->index('rk_id', 'idx_tutam_rk_id');
            });
        }

        // Add index to tuti.tutam_id for faster joins
        if (Schema::hasTable('tuti')) {
            Schema::table('tuti', function (Blueprint $table) {
                $table->index('tutam_id', 'idx_tuti_tutam_id');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Drop the indexes
        if (Schema::hasTable('users')) {
            Schema::table('users', function (Blueprint $table) {
                $table->dropIndex(['idx_users_penilai_id']);
                $table->dropIndex(['idx_users_pasangan_id']);
            });
        }

        if (Schema::hasTable('penilai')) {
            Schema::table('penilai', function (Blueprint $table) {
                $table->dropIndex(['idx_penilai_user_id']);
            });
        }

        if (Schema::hasTable('atasan')) {
            Schema::table('atasan', function (Blueprint $table) {
                $table->dropIndex(['idx_atasan_user_id']);
            });
        }

        if (Schema::hasTable('tutam')) {
            Schema::table('tutam', function (Blueprint $table) {
                $table->dropIndex(['idx_tutam_user_id']);
                $table->dropIndex(['idx_tutam_rk_id']);
            });
        }

        if (Schema::hasTable('tuti')) {
            Schema::table('tuti', function (Blueprint $table) {
                $table->dropIndex(['idx_tuti_tutam_id']);
            });
        }
    }
};
