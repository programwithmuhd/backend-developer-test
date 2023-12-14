<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Lesson;
use App\Events\LessonWatched;
use App\Events\CommentWritten;
use Illuminate\Support\Facades\Event;
use Database\Factories\CommentFactory;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Database\Factories\UserFactory; // Import UserFactory

class UserEventsTest extends TestCase
{
    use RefreshDatabase;

    public function test_that_lesson_watched_event_is_triggered()
    {
        Event::fake();

        $user = UserFactory::new()->create();
        $lesson = Lesson::factory()->create();

        LessonWatched::dispatch($lesson, $user);

        Event::assertDispatched(LessonWatched::class, function ($e) use ($lesson, $user) {
            return $e->lesson->id === $lesson->id && $e->user->id === $user->id;
        });
    }

    public function test_that_comment_written_event_is_triggered()
    {
        Event::fake();

        $user = User::factory()->create();
        $comment = CommentFactory::new()->create();

        CommentWritten::dispatch($comment);
        Event::assertDispatched(CommentWritten::class, function ($e) use ($comment) {
            return $e->comment->id === $comment->id;
        });
    }
}
