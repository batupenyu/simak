<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Mapelseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $dataMapel = [
            [
                'name' => 'Pendidikan Agama Islam',
            ],
            [
                'name' => 'Pendidikan Agama Kristen',
            ],
            [
                'name' => 'Pendidikan Agama Katholik',
            ],
            [
                'name' => 'Pendidikan Agama Hindu',
            ],
            [
                'name' => 'Pendidikan Agama Budha',
            ],
            [
                'name' => 'Pendidikan Pancasila dan Kewarganegaraan',
            ],
            [
                'name' => 'Bahasa Indonesia',
            ],
            [
                'name' => 'Bahasa Inggris',
            ],
            [
                'name' => 'Matematika',
            ],
            [
                'name' => 'Ilmu Pengetahuan Alam',
            ],
            [
                'name' => 'Ilmu Pengetahuan Sosial',
            ],
            [
                'name' => 'Seni Budaya',
            ],
            [
                'name' => 'Pendidikan Jasmani, Olahraga, dan Kesehatan',
            ],
            [
                'name' => 'Prakarya dan Kewirausahaan',
            ],
            [
                'name' => 'Bahasa Jawa',
            ],
            [
                'name' => 'Bahasa Sunda',
            ],
            [
                'name' => 'Bahasa Arab',
            ],
            [
                'name' => 'Bahasa Mandarin',
            ],
            [
                'name' => 'Bahasa Jepang',
            ],
            [
                'name' => 'Bahasa Korea',
            ],
            [
                'name' => 'Bahasa Rusia',
            ],
            [
                'name' => 'Bahasa Spanyol',
            ],
            [
                'name' => 'Bahasa Prancis',
            ],
            [
                'name' => 'Bahasa Jerman',
            ],
            [
                'name' => 'Bahasa Belanda',
            ],
            [
                'name' => 'Bahasa Italia',
            ],
            [
                'name' => 'Bahasa Portugis',
            ],
            [
                'name' => 'Bahasa Turki',
            ],
            [
                'name' => 'Bahasa Persia',
            ],
            [
                'name' => 'Bahasa Hindi',
            ],
            [
                'name' => 'Bahasa Urdu',
            ]
        ];
        foreach ($dataMapel as $value) {
            \App\Models\Mapel::create($value);
        }
    }
}
