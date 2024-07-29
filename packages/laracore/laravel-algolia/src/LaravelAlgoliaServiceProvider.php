<?php

namespace Laracore\LaravelAlgolia;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use Laracore\LaravelAlgolia\Commands\TestAlgoliaConnectionCommand;

class LaravelAlgoliaServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../resources/assets' => public_path('laracore-algolia'),
            ], 'assets');

            // Publish the config file
            $this->publishes([
                __DIR__.'/../config/laracore-algolia.php' => config_path('laracore-algolia.php'),
            ], 'config');

            /**
             *  whenever someone runs php artisan migrate, the migrations from the package would be executed.
             */
            // $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');

            // Publish the migration
            $this->publishes([
                __DIR__ . '/../database/migrations/2024_07_29_063539_create_laracore_algolia_requests_table.php' =>
                database_path('migrations/' . date('Y_m_d_His', time()) . '_create_laracore_algolia_requests_table.php'),
            ], 'migrations');

            // Register the commands
            $this->commands([
                TestAlgoliaConnectionCommand::class,
            ]);
        }
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

        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'laracore-algolia');


        // Merge the package configuration
        $this->mergeConfigFrom(
            __DIR__.'/../config/laracore-algolia.php', 'laracore-algolia'
        );
    }
}
