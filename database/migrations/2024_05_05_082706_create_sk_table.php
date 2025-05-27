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
        Schema::create('sk', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->string('sk_pejabat')->nullable()->default('null');
            $table->string('no_sk')->nullable()->default('null');
            $table->date('sk_tgl');
            $table->string('sk_tentang')->nullable()->default('null');
            $table->string('sk_sebagai')->nullable()->default('null');
            $table->string('no_surat') ;
            $table->date('tgl_surat') ;
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sk');
    }
};
