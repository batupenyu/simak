<?php

namespace Database\Seeders;

use App\Models\Eks;
use App\Models\Umpan;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EksUmpanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get all user IDs
        $userIds = DB::table('users')->pluck('id');

        foreach ($userIds as $userId) {
            // Create eks record if not exists
            if (!Eks::where('user_id', $userId)->exists()) {
                Eks::create([
                    'user_id' => $userId,
                    'eks1' => '',
                    'eks2' => '',
                    'eks3' => '',
                    'eks4' => '',
                    'eks5' => '',
                    'eks6' => '',
                    'eks7' => '',
                ]);
            }

            // Create umpan record if not exists
            if (!Umpan::where('user_id', $userId)->exists()) {
                Umpan::create([
                    'user_id' => $userId,
                    'umpan1' => '',
                    'umpan2' => '',
                    'umpan3' => '',
                    'umpan4' => '',
                    'umpan5' => '',
                    'umpan6' => '',
                    'umpan7' => '',
                ]);
            }
        }
    }
}
