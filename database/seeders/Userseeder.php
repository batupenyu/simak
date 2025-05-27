<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Userseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $userData = [
            [
                `atasan_id` => '1',
                `penilai_id` => '1',
                `project_id` => '1',
                `pasangan_id` => '1',
                `name` => 'admin',
                `email` => 'hendri@gmail.com',
                `nip` => '123456789',
                `net_lain` => '-',
                `job_lain` => '-',
                `alamat` => 'Jl. Jendral Sudirman',
                `agama` => 'Islam',
                `jk` => 'Laki-laki',
                `tgl_lahir` => '1990-01-01',
                `pangkat_gol` => 'Penata, III/C',
                `tmt_pangkat` => '2019-01-01',
                `tmt_jabatan` => '2019-01-01',
                `no_karpeg` => '123456789',
                `jabatan` => 'Kepala Sekolah',
                `ak_integrasi` => '51.353',
                `unit_kerja` => 'SMP Negeri 1',
                `email_verified_at` => '2021-01-01',
                `password` => bcrypt('123'),
                `tgl_awal` => '2021-01-01',
                `tgl_akhir` => '2021-12-31',
                `tgl_pegawai` => '2021-01-01',
                `tgl_penilai` => '2021-01-01',
                `tgl_atasan` => '2021-01-01',
                `tgl_kp4` => '2021-01-01',
                `pendidikan` => 'S1',
                `status` => 'PNS',
                `jenis` => 'Guru',
                `nik` => '123456789',
                `kabupaten` => 'Kabupaten',
                `kecamatan` => 'Kecamatan',
                `desa_kelurahan` => 'Desa',
                `sertifikasi` => 'Sudah',
                `jurusan` => 'Pendidikan Agama Islam',
            ]

        ];

        foreach ($userData as $key => $val) {
            User::create($val);
        }
    }
}
