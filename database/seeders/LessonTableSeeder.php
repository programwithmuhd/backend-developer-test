<?php

namespace Database\Seeders;

use App\Models\Lesson;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class LessonTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Lesson::create(['title' => 'Laravel Livewire']);
        Lesson::create(['title' => 'Laravel Inertia']);
        Lesson::create(['title' => 'Laravel Filament']);
    }
}
