<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Lesson;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class LessonUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         // Adjust the number based on your needs
         $numberOfRecords = 2;

         // Loop to create fake lesson_user records
        for ($i = 0; $i < $numberOfRecords; $i++) {
            DB::table('lesson_user')->insert([
                'user_id' => User::inRandomOrder()->first()->id,
                'lesson_id' => Lesson::inRandomOrder()->first()->id,
                'watched' => rand(0, 1),
            ]);
        }
    }
}
