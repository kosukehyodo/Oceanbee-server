<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            \App\Repositories\Contract\UserContract::class,
            \App\Repositories\EloquentUserRepository::class
        );

        $this->app->bind(
            \App\Repositories\Contract\PlanContract::class,
            \App\Repositories\EloquentPlanRepository::class
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
