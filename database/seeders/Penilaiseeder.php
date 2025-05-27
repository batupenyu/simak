<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Penilaiseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $dataPenilai = [
            [


                'nama' => 'Hariyanto,S.Pd',
                'nip' => '197001202005011006',
                'pangkat_gol' => 'Penata TK.I, III/d',
                'jabatan' => 'Guru',
                'unit_kerja' => 'SMK Negeri 1 Simpang Rimba',
            ],
        ];

        foreach ($dataPenilai as $penilai) {
            \App\Models\Penilai::create($penilai);
        }
    }
}
