<?php

namespace Tests\Feature;

use Tests\TestCase;

use App\Models\User;
use App\Models\Achievement;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Database\Eloquent\Factories\Factory;

class BadgeIsUnlockedTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    use RefreshDatabase;


    public function test_that_badge_is_unlocked()
    {
        $this->seed();

        $user = User::first();
        $achievement = Achievement::first();

        $this->assertTrue($user->achievements->contains($achievement));
    }
}
