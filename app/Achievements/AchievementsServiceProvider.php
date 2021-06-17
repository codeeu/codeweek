<?php


namespace App\Achievements;


use App\Achievements\Console\GenerateAchievementCommand;
use App\Achievements\Console\SyncUsersAchievements;
use App\Achievements\Events\UserEarnedExperience;


use Illuminate\Support\Facades\Event;
use Illuminate\Support\ServiceProvider;

class AchievementsServiceProvider extends ServiceProvider
{

    protected $achievements = [
        Types\StartYourEngines::class
    ];

    public function boot()
    {
        Event::listen(UserEarnedExperience::class, AwardAchievements::class);
    }

    public function register()
    {
        $this->app->singleton('achievements', function () {
            return cache()->rememberForever('achievements', function () {
                return collect($this->achievements)->map(function ($achievement) {
                    return new $achievement;
                });
            });
        });

        $this->commands([GenerateAchievementCommand::class,SyncUsersAchievements::class]);
    }



}