<?php

namespace App\Http\Controllers;

use App\Models\Badge;
use App\Models\Comment;
use App\Models\Lesson;
use App\Models\User;
use Illuminate\Http\Request;

class AchievementsController extends Controller
{
    public function index(User $user)
    {
        $unlockedAchievements = $user->achievements->pluck('name')->toArray();

        $lessons = Lesson::all()->toArray();
        $comments = Comment::all()->toArray();

        $allAchievements = [
            $lessons,
            $comments,
        ];

        $nextAvailableAchievements = [];
        foreach ($allAchievements as $group => $achievements) {
            foreach ($achievements as $achievement) {
                if (!in_array($achievement, $unlockedAchievements)) {
                    $nextAvailableAchievements[$group] = $achievement;
                    break;
                }
            }
        }

        $currentBadge = $this->getCurrentBadge($user->achievements->count());
        $nextBadge = $this->getNextBadge($user->achievements->count());
        $remainingToUnlockNextBadge = $this->getRemainingToUnlockNextBadge($user->achievements->count());

        return [
            'unlocked_achievements' => $unlockedAchievements,
            'next_available_achievements' => array_values($nextAvailableAchievements),
            'current_badge' => $currentBadge,
            'next_badge' => $nextBadge,
            'remaining_to_unlock_next_badge' => $remainingToUnlockNextBadge,
        ];
    }

    private function getCurrentBadge($achievementCount)
    {
        $badgeRanks = [0, 4, 8, 10];

        foreach ($badgeRanks as $index => $rank) {
            if ($achievementCount < $rank) {
                return $this->getBadgeName($index);
            }
        }

        return $this->getBadgeName(count($badgeRanks) - 1);
    }

    private function getNextBadge($achievementCount)
    {
        $badgeRanks = [0, 4, 8, 10];

        foreach ($badgeRanks as $index => $rank) {
            if ($achievementCount < $rank) {
                return $this->getBadgeName($index);
            }
        }

        return null;
    }

    private function getRemainingToUnlockNextBadge($achievementCount)
    {
        $badgeRanks = [0, 4, 8, 10];

        foreach ($badgeRanks as $rank) {
            if ($achievementCount < $rank) {
                return $rank - $achievementCount;
            }
        }

        return 0;
    }


    private function getBadgeName($badgeRank)
    {
        $badgeNames = Badge::pluck('name')->toArray();
        
        if ($badgeRank >= 0 && $badgeRank < count($badgeNames)) {
            return $badgeNames[$badgeRank];
        } else {
            return 'Unknown Badge';
        }
    }

}
