<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {

        $this->registerPolicies();

        Gate::define('superadmin', function ($user) {
            if ($user->role == "super admin") {
                return true;
            }

        });

        Gate::define('admin', function ($user) {
            if ($user->role == "admin") {
                return true;
            }
        });

        Gate::define('user', function ($user) {
            if ($user->role == "user") {
                return true;
            }
        });

        Gate::define('adminSuperAdmin', function ($user) {
            if ($user->role === "admin" or $user->role === "super admin") {
                return true;
            }

        });

    }
}
