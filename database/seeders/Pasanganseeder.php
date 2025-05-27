<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Pasanganseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $dataPasangan = [
            [

                'name' => 'Ullfah Kharisma',
                'status' => 'Menanggung',
                'tgl_lahir' => '1990-10-10',
                'tgl_kawin' => '2010-10-10',
                'job' => 'Ibu Rumah Tangga',
                'net' => '5000000',
            ],
            [

                'name' => 'Yusuf Kharisma',
                'status' => 'Menanggung',
                'tgl_lahir' => '1990-10-10',
                'tgl_kawin' => '2010-10-10',
                'job' => 'Ibu Rumah Tangga',
                'net' => '5000000',
            ],
            [

                'name' => 'dewi Kharisma',
                'status' => 'Menanggung',
                'tgl_lahir' => '1990-10-10',
                'tgl_kawin' => '2010-10-10',
                'job' => 'Ibu Rumah Tangga',
                'net' => '5000000',
            ],
            [

                'name' => 'nurul Kharisma',
                'status' => 'Menanggung',
                'tgl_lahir' => '1990-10-10',
                'tgl_kawin' => '2010-10-10',
                'job' => 'Ibu Rumah Tangga',
                'net' => '5000000',
            ]
        ];
        foreach ($dataPasangan as $pasangan) {
            \App\Models\Pasangan::create($pasangan);
        }
    }
}
