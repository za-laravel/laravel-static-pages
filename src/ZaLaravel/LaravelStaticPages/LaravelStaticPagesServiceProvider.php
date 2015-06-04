<?php

namespace ZaLaravel\LaravelStaticPages;

use Illuminate\Support\ServiceProvider;

/**
 * Class LaravelStaticPagesServiceProvider
 * @package ZaLaravel\LaravelStaticPages
 */
class LaravelStaticPagesServiceProvider extends ServiceProvider {

    /**
     * @return void
     */
    public function boot()
    {
        // Views
        $this->loadViewsFrom(__DIR__ . '/../../views', 'laravel-static-pages');

        // Binding
        $this->app->bind('ZaLaravel\LaravelStaticPages\Models\Interfaces\StaticPagesInterface',
            'ZaLaravel\LaravelStaticPages\Models\StaticPage');

        // Migrations
        $this->publishes([
            __DIR__.'/../../database/migrations/' => base_path('/database/migrations')
        ], 'migrations');

        // Seeds
        $this->publishes([
            __DIR__.'/../../database/seeds/' => base_path('/database/seeds')
        ], 'seeds');

        // Routes
        include __DIR__.'/../../routes.php';
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [];
    }
}