<?php

namespace Database\Seeders;

use App\Models\Comment;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CommentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Comment::create(['body' => 'Great lesson I like how you guys teach visually!', 'user_id' => 1]);
        Comment::create(['body' => 'I have a question about events in Inertia.', 'user_id' => 2]);
        // Comment::create(['body' => 'You guys should look forward to add Vue 3 course.', 'user_id' => 4]);
        // Comment::create(['body' => 'I will also subscribe in your Alpine course.', 'user_id' => 1]);
    }
}
