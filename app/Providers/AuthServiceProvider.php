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
        'App\Event' => 'App\Policies\EventPolicy',
        'App\User' => 'App\Policies\UserPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

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
