<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppRepositoryProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */

    public $repositoryBindings = [
        'App\Repositories\Interfaces\User\UserRepositoryInterface' => 'App\Repositories\User\UserRepository',
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
