<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Events\BadgeUnlocked;
use Laravel\Sanctum\HasApiTokens;
use App\Events\AchievementUnlocked;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    /**
     * The comments that belong to the user.
     */
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    /**
     * The lessons that a user has access to.
     */
    public function lessons()
    {
        return $this->belongsToMany(Lesson::class);
    }

    /**
     * The lessons that a user has watched.
     */
    public function watched()
    {
        return $this->belongsToMany(Lesson::class)->wherePivot('watched', true);
    }

    public function unlockAchievement($achievementName)
    {
        // Logic to unlock the achievement
        // Update user's achievements in the database
        $this->achievements()->attach(Achievement::where('name', $achievementName)->first());
        
        event(new AchievementUnlocked($achievementName, $this));
    }

    public function unlockBadge($badgeName)
    {
        // Logic to unlock the badge
        // Update user's badges in the database
        $this->badges()->attach(Badge::where('name', $badgeName)->first());

        event(new BadgeUnlocked($badgeName, $this));
    }

    public function achievements()
    {
        return $this->belongsToMany(Achievement::class)->withTimestamps();
    }

    public function badges()
    {
        return $this->belongsToMany(Badge::class)->withTimestamps();
    }
}

