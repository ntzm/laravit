<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'App\Repositories\Post\PostRepositoryInterface',
            'App\Repositories\Post\EloquentPostRepository'
        );

        $this->app->bind(
            'App\Repositories\Sub\SubRepositoryInterface',
            'App\Repositories\Sub\EloquentSubRepository'
        );
    }
}
