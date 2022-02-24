<?php


namespace App\Achievements;


use App\Achievements\Console\GenerateAchievementCommand;
use App\Achievements\Console\SyncExperience;
use App\Achievements\Console\SyncUsersAchievements;
use App\Achievements\Events\UserEarnedExperience;


use App\Achievements\Types\StartYourEngines;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\ServiceProvider;

class AchievementsServiceProvider extends ServiceProvider
{

    protected $achievements = [
        Types\OrganiserActive2021::class,
        Types\OrganiserExpert2021::class,
        Types\OrganiserChampion2021::class,
        Types\OrganiserLegendary2021::class,
        Types\OrganiserMaster2021::class,
        Types\Influencer2021::class,
        Types\InfluencerActive2021::class,
        Types\InfluencerExpert2021::class,
        Types\InfluencerChampion2021::class,
        Types\InfluencerLegendary2021::class,
        Types\OrganiserActive2022::class,
        Types\OrganiserExpert2022::class,
        Types\OrganiserChampion2022::class,
        Types\OrganiserLegendary2022::class,
        Types\OrganiserMaster2022::class,
        Types\Influencer2022::class,
        Types\InfluencerActive2022::class,
        Types\InfluencerExpert2022::class,
        Types\InfluencerChampion2022::class,
        Types\InfluencerLegendary2022::class

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

        $this->commands([GenerateAchievementCommand::class,SyncUsersAchievements::class, SyncExperience::class]);
    }



}
