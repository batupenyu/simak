<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Akseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $dataAk = [
            [
                'user_id' => '1',
                'penilai_id' => '1',
                'predikat' => 'Sangat Baik',
                'tgl_awal_penilaian' => '2023-01-01',
                'tgl_akhir_penilaian' => '2023-12-31',
                'tgl_penetapan' => '2024-01-02',
            ],
            [
                'user_id' => '1',
                'penilai_id' => '1',
                'predikat' => 'Baik',
                'tgl_awal_penilaian' => '2024-01-01',
                'tgl_akhir_penilaian' => '2024-12-31',
                'tgl_penetapan' => '2025-01-02',
            ],


        ];

        foreach ($dataAk as $ak) {
            \App\Models\Angka_kredit::create($ak);
        }
    }
}
