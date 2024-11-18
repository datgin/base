<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */

    protected $repositoryBindings = [
        // Auth
        'App\Services\Interfaces\Auth\AuthServiceInterface' => 'App\Services\Auth\AuthService',

        'App\Services\Interfaces\User\UserServiceInterface' => 'App\Services\User\UserService',
    ];

    public function register(): void
    {
        foreach ($this->repositoryBindings as $interface => $implementation) {
            $this->app->bind($interface, $implementation);
        }
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
