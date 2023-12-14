<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AchievementUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('achievement_user')->insert([
            'user_id' => 1,
            'achievement_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('achievement_user')->insert([
            'user_id' => 2,
            'achievement_id' => 2,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('achievement_user')->insert([
            'user_id' => 3,
            'achievement_id' => 3,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('achievement_user')->insert([
            'user_id' => 1,
            'achievement_id' => 4,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
