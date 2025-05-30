<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Hash;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('nip')->nullable();
            $table->unsignedBigInteger('penilai_id')->nullable();
            $table->date('tgl_lahir')->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->string('jk')->nullable();
            $table->text('alamat')->nullable();
            $table->string('email')->default('admin@gmail.com')->unique();
            $table->string('agama')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->default('$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi'); // hash for 'admin'
            $table->string('tmt_pangkat')->nullable();
            $table->string('tmt_jabatan')->nullable();
            $table->string('no_karpeg')->nullable();
            $table->string('job_lain')->nullable();
            $table->string('net_lain')->nullable();
            $table->string('pangkat_gol')->nullable();
            $table->string('ak_integrasi')->nullable();
            $table->date('tgl_kp4')->nullable();
            $table->string('unit_kerja')->nullable();
            $table->date('tgl_awal')->nullable();
            $table->date('tgl_akhir')->nullable();
            $table->date('tgl_pegawai')->nullable();
            $table->date('tgl_penilai')->nullable();
            $table->date('tgl_atasan')->nullable();
            $table->unsignedBigInteger('pasangan_id')->nullable();
            $table->string('pendidikan')->nullable();
            $table->string('status')->nullable();
            $table->string('jenis')->nullable();
            $table->string('kabupaten')->nullable();
            $table->string('kecamatan')->nullable();
            $table->string('desa_kelurahan')->nullable();
            $table->string('sertifikasi')->nullable();
            $table->string('nik')->nullable();
            $table->string('mapel')->nullable();
            $table->string('jurusan')->nullable();
            $table->string('sumber_gaji')->nullable();
            $table->string('nuptk')->nullable();
            $table->string('jabatan')->nullable();
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('penilai_id')->references('id')->on('penilai')->onDelete('set null');
            $table->foreign('pasangan_id')->references('id')->on('pasangan')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
