<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKaryawanTable extends Migration
{
    public function up()
    {
        Schema::create('karyawan', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('nip')->unique();
            $table->string('nomor_karpeg')->unique();
            $table->string('tempat_lahir');
            $table->date('tgl_lahir');
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan']);
            $table->string('pangkat');
            $table->date('tmt_pangkat');
            $table->string('jabatan');
            $table->date('tmt_jabatan');
            $table->string('unit_kerja');
            $table->string('instansi');
            $table->string('ak_integrasi');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('karyawan');
    }
}
