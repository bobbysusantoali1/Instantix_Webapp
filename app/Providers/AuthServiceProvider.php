<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\user;
use App\Models\event;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();


        // CHECK IF EVENT BELONGS TO USER
        Gate::define('manage-event', function (user $user, event $event){
            if ($user->role != 'eventOrganizer'){
                return false;
            }

            return $user->id == $event->user_id;
        });

        //
    }
}
