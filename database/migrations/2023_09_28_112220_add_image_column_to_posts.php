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
        Schema::table('posts', function (Blueprint $table) {
            if (!Schema::hasColumn('posts', 'image')) {
                $table->string('image');
            }
            if (!Schema::hasColumn('posts', 'title')) {
                $table->string('title');
            }
            if (!Schema::hasColumn('posts', 'content')) {
                $table->text('content');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasColumn('posts', 'image') || Schema::hasColumn('posts', 'title') || Schema::hasColumn('posts', 'content')) {
            Schema::table('posts', function (Blueprint $table) {
                if (Schema::hasColumn('posts', 'image')) {
                    $table->dropColumn('image');
                }
                if (Schema::hasColumn('posts', 'title')) {
                    $table->dropColumn('title');
                }
                if (Schema::hasColumn('posts', 'content')) {
                    $table->dropColumn('content');
                }
            });
        }
    }
};
