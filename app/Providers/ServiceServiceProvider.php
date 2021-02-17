<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ServiceServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            \App\Services\Contracts\UserServiceContract::class,
            \App\Services\UserService::class
        );
        $this->app->bind(
            \App\Services\Contracts\ExampleServiceContract::class,
            \App\Services\ExampleService::class
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
