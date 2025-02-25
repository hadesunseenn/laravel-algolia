<?php

namespace Laracore\LaravelAlgolia;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;

class LaravelAlgoliaServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        // Publish the config file
        $this->publishes([
            __DIR__.'/../config/laracore-algolia.php' => config_path('laracore-algolia.php'),
        ], 'config');
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        Route::prefix('laracore-algolia')
            ->as('laracore-algolia.')
            ->group(function () {
                $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');
            });

        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'laravel-algolia');


        // Merge the package configuration
        $this->mergeConfigFrom(
            __DIR__.'/../config/laracore-algolia.php', 'laracore-algolia'
        );
    }
}
