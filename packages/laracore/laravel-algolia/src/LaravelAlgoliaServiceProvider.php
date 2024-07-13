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
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        Route::prefix('laravel-algolia')
            ->as('laravel-algolia.')
            ->group(function () {
                $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');
            });
    }
}
