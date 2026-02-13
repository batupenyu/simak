<?php

namespace Database\Seeders;

use App\Models\Penilai;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PenilaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get all user IDs
        $userIds = DB::table('users')->pluck('id');

        foreach ($userIds as $userId) {
            // Create penilai record if not exists
            if (!Penilai::where('user_id', $userId)->exists()) {
                Penilai::create([
                    'user_id' => $userId,
                    'nama' => '',
                    'nip' => '',
                    'pangkat_gol' => '',
                    'jabatan' => '',
                    'unit_kerja' => '',
                ]);
            }
        }
    }
}
