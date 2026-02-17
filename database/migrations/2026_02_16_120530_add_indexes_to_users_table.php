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
            // Add indexes for commonly queried columns in ProjectController
            $table->index('status');
            $table->index('jenis');
            $table->index('jk');
            $table->index('pendidikan');
            $table->index('pangkat_gol');
            $table->index('jabatan');
            $table->index('sumber_gaji');
            // Composite indexes for common query combinations
            $table->index(['status', 'jenis']);
            $table->index(['status', 'jenis', 'jk']);
            $table->index(['status', 'pendidikan']);
            $table->index(['jenis', 'jk', 'pangkat_gol']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};
