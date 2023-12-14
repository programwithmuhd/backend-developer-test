<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BadgeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $badges = [
            'Beginner',
            'Intermediate',
            'Advanced',
            'Master',
        ];

        foreach ($badges as $badge) {
            DB::table('badges')->insert(['name' => $badge]);
        }
    }
}
