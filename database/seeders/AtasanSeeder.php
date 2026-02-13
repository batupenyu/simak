<?php

namespace Database\Seeders;

use App\Models\Atasan;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AtasanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get all user IDs
        $userIds = DB::table('users')->pluck('id');

        foreach ($userIds as $userId) {
            // Create atasan record if not exists
            if (!Atasan::where('user_id', $userId)->exists()) {
                Atasan::create([
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
