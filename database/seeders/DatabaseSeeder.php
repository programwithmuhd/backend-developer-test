<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Lesson;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // $lessons = Lesson::factory()
        //     ->count(20)
        //     ->create();
        $users = User::factory()
            ->count(20)
            ->create();

        $this->call([
            LessonTableSeeder::class,
            CommentTableSeeder::class,
            AchievementTableSeeder::class,
            BadgeTableSeeder::class,
            AchievementUserTableSeeder::class,
        ]);
    }
}
