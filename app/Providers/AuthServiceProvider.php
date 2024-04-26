<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
        \App\Event::class => \App\Policies\EventPolicy::class,
        \App\User::class => \App\Policies\UserPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        Gate::define('report-excellence', function ($user, $edition) {

            $excellences = $user->excellences;

            $collection = $excellences->filter(
                function ($value, $key) use ($edition) {
                    return $value->edition == $edition;
                }
            );

            return $collection->count() > 0;
        });

        Gate::define('report-super-organiser', function ($user, $edition) {

            $superOrganisers = $user->superOrganisers;

            $collection = $superOrganisers->filter(
                function ($value, $key) use ($edition) {
                    return $value->edition == $edition;
                }
            );

            return $collection->count() > 0;
        });

    }
}
