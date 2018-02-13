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

// définition des autorisations pour le profil super admin
        Gate::define('superadmin', function ($user) {
            if ($user->role == "super admin") {
                return true;
            }
        });

// définition des autorisations pour le profil admin
        Gate::define('admin', function ($user) {
            if ($user->role == "admin") {
                return true;
            }
        });

// définition des autorisations pour le profil user
        Gate::define('user', function ($user) {
            if ($user->role == "user") {
                return true;
            }
        });

// définition des autorisations pour le profil admin et super admin
        Gate::define('adminSuperAdmin', function ($user) {
            if ($user->role === "admin" or $user->role === "super admin") {
                return true;
            }

        });

// définition des autorisations pour tous les profils loguer
        Gate::define('all', function ($user) {
            if ($user->role === "admin" or $user->role === "super admin" or $user->role == 'user') {
                return true;
            }

        });

    }
}
