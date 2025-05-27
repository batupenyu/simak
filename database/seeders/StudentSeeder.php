<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Student;
use App\Models\ClassRoom;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
    //  */
    public function run(): void
    {
        //     Schema::disableForeignKeyConstraints();
        //     Student::truncate();
        //     Schema::enableForeignKeyConstraints();

        //     $data = [
        //         ['class_id' => 1, 'name' => 'aiu', 'gender' => 'P', 'nis' => '0101001'],
        //         ['class_id' => 2, 'name' => 'budi', 'gender' => 'L', 'nis' => '0101002'],
        //         ['class_id' => 3, 'name' => 'iwan', 'gender' => 'L', 'nis' => '0101003'],
        //         ['class_id' => 4, 'name' => 'santi', 'gender' => 'P', 'nis' => '0101004'],
        //     ];
        //     foreach ($data as $value) {
        //         Student::insert([
        //             'class_id' => $value['class_id'],
        //             'name' => $value['name'],
        //             'gender' => $value['gender'],
        //             'nis' => $value['nis'],
        //             'created_at' => Carbon::now(),
        //             'updated_at' => Carbon::now(),

        //         ]);
        //     }
        Student::create()->factory();
    }
}
