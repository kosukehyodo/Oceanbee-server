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

        $this->app->bind(
            \App\Repositories\Contract\PlanImageContract::class,
            \App\Repositories\EloquentPlanImageRepository::class
        );

        $this->app->bind(
            \App\Repositories\Contract\PlanPriceContract::class,
            \App\Repositories\EloquentPlanPriceRepository::class
        );

        $this->app->bind(
            \App\Repositories\Contract\ProfileContract::class,
            \App\Repositories\EloquentProfileRepository::class
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
