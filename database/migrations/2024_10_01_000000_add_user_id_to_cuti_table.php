<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if (!Schema::hasColumn('cuti', 'user_id')) {
            Schema::table('cuti', function (Blueprint $table) {
                $table->unsignedBigInteger('user_id')->after('id')->nullable();
            });

            // Add foreign key constraint using raw SQL for Doctrine DBAL compatibility
            DB::statement('ALTER TABLE cuti ADD CONSTRAINT cuti_user_id_foreign FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE');
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('cuti', function (Blueprint $table) {
            $table->dropForeign('cuti_user_id_foreign');
            $table->dropColumn('user_id');
        });
    }
};
