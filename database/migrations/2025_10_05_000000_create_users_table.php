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
        if (!Schema::hasTable('users')) {
            Schema::create('users', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('atasan_id')->nullable();
                $table->unsignedBigInteger('penilai_id')->nullable();
                $table->unsignedBigInteger('pasangan_id')->nullable();
                $table->unsignedBigInteger('project_id')->nullable();
                $table->string('name');
                $table->string('email')->unique();
                $table->string('nip')->nullable();
                $table->string('net_lain')->nullable();
                $table->string('job_lain')->nullable();
                $table->string('alamat')->nullable();
                $table->string('agama')->nullable();
                $table->string('jk')->nullable();
                $table->date('tgl_lahir')->nullable();
                $table->string('pangkat_gol')->nullable();
                $table->date('tmt_pangkat')->nullable();
                $table->date('tmt_jabatan')->nullable();
                $table->string('no_karpeg')->nullable();
                $table->string('jabatan')->nullable();
                $table->decimal('ak_integrasi', 8, 3)->nullable();
                $table->string('unit_kerja')->nullable();
                $table->timestamp('email_verified_at')->nullable();
                $table->string('password');
                $table->date('tgl_awal')->nullable();
                $table->date('tgl_akhir')->nullable();
                $table->date('tgl_pegawai')->nullable();
                $table->date('tgl_penilai')->nullable();
                $table->date('tgl_atasan')->nullable();
                $table->date('tgl_kp4')->nullable();
                $table->string('pendidikan')->nullable();
                $table->string('status')->nullable();
                $table->string('jenis')->nullable();
                $table->string('nik')->nullable();
                $table->string('kabupaten')->nullable();
                $table->string('kecamatan')->nullable();
                $table->string('desa_kelurahan')->nullable();
                $table->string('sertifikasi')->nullable();
                $table->string('jurusan')->nullable();
                $table->timestamps();

                $table->foreign('atasan_id')->references('id')->on('atasan')->onDelete('set null');
                $table->foreign('penilai_id')->references('id')->on('penilai')->onDelete('set null');
                $table->foreign('pasangan_id')->references('id')->on('pasangan')->onDelete('set null');
                $table->foreign('project_id')->references('id')->on('projects')->onDelete('set null');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
