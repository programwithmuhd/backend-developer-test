<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AchievementTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $achievements = [
            'First Lesson Watched',
            '5 Lessons Watched',
            '10 Lessons Watched',
            '25 Lessons Watched',
            '50 Lessons Watched',
            'First Comment Written',
            '3 Comments Written',
            '5 Comments Written',
            '10 Comments Written',
            '20 Comments Written',
        ];

        foreach ($achievements as $achievement) {
            DB::table('achievements')->insert(['name' => $achievement]);
        }
    }
}
