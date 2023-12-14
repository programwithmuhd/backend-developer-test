<?php

namespace Tests\Feature;

use Database\Factories\UserFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AchievementEndpointTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_that_achievement_endpoint_is_working_as_expected()
    {
        $user = UserFactory::new()->create();
        
        $response = $this->get("/users/{$user->id}/achievements");

        $response->assertStatus(200)
            ->assertJsonStructure([
                'unlocked_achievements',
                'next_available_achievements',
                'current_badge',
                'next_badge',
                'remaining_to_unlock_next_badge',
            ]);
    }
}
