<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin User',
            'nip' => '123456789',
            'penilai_id' => null,
            'tgl_lahir' => '1990-01-01',
            'tempat_lahir' => 'City',
            'jk' => 'M',
            'alamat' => 'Address',
            'email' => 'admin@gmail.com',
            'agama' => 'Religion',
            'email_verified_at' => now(),
            'password' => Hash::make('admin'),
            'tmt_pangkat' => null,
            'tmt_jabatan' => null,
            'no_karpeg' => null,
            'job_lain' => null,
            'net_lain' => null,
            'pangkat_gol' => null,
            'ak_integrasi' => null,
            'tgl_kp4' => null,
            'unit_kerja' => null,
            'tgl_awal' => null,
            'tgl_akhir' => null,
            'tgl_pegawai' => null,
            'tgl_penilai' => null,
            'tgl_atasan' => null,
            'pasangan_id' => null,
            'pendidikan' => null,
            'status' => null,
            'jenis' => null,
            'kabupaten' => null,
            'kecamatan' => null,
            'desa_kelurahan' => null,
            'sertifikasi' => null,
            'nik' => null,
            'mapel' => null,
            'jurusan' => null,
            'sumber_gaji' => null,
            'nuptk' => null,
            'jabatan' => null,
        ]);
    }
}
