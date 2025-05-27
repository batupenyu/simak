<?php

namespace Database\Seeders;

use App\Models\Barang;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['user_id'=>1,
            'nomor'=>'001',
            'tgl_awal'=>'2024-11-11',
            'tgl_akhir'=>'2024-12-31',
            'jenis'=>'mobil',
            'type'=>'Toyota inova',
            'tahun'=>'2024','spek'=>'Abu-abu Metalik'],
            ['user_id'=>2,
            'nomor'=>'002',
            'tgl_awal'=>'2024-11-11',
            'tgl_akhir'=>'2024-12-31',
            'jenis'=>'mobil',
            'type'=>'Toyota avanza',
            'tahun'=>'2024',
            'spek'=>'Abu-abu Metalik'],
        ];

        foreach ($data as $value)
        {
            Barang::insert ([
                'user_id'=> $value['user_id'],
                'nomor'=> $value['nomor'],
                'tgl_awal'=>$value['tgl_awal'],
                'tgl_akhir'=>$value['tgl_akhir'],
                'jenis'=> $value['jenis'],
                'type'=> $value['type'],
                'tahun'=> $value['tahun'],
                'spek'=> $value['spek'],
                'created_at'=>Carbon::now() ,
                'updated_at'=>Carbon::now() ,
            ]);
        }
    }
}
