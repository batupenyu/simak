<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AtasanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $dataAtasan = [
            [
                'nama' => 'Sjamsul Bahri, S.H., M.AP.',
                'nip' => '197806042002121005',
                'jabatan' => 'Kepala Cabang',
                'pangkat_gol' => 'Pembina, IV/a',
                'unit_kerja' => 'Cabang Dinas wilayah I',
            ],
        ];
        foreach ($dataAtasan as $atasan) {
            \App\Models\Atasan::create($atasan);
        }
    }
}
