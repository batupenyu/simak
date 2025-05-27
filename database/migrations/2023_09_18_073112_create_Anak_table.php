<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Validation\Rules\Enum;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('anak', function (Blueprint $table) {
            $table->id();
            $table->integer('project_id');
            $table->integer('user_id');
            $table->string('name');
            $table->date('tgl_lahir');
            $table->string('anak');
            $table->string('perkawinan');
            $table->string('status_sekolah');
            $table->string('status_beasiswa');
            $table->date('tgl_meninggal_cerai');
            $table->string('pekerjaan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('anak');
    }
};
