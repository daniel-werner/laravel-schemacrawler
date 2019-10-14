<?php

namespace DanielWerner\LaravelSchemaCrawler;

use Illuminate\Support\ServiceProvider;
use DanielWerner\LaravelSchemaCrawler\Console\Commands\SchemaCrawlerCommand;

class LaravelSchemaCrawlerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot(): void
    {
        /*
         * Optional methods to load your package assets
         */
        if (config('laravel-schemacrawler.routes_enabled')) {
            $this->loadRoutesFrom(__DIR__.'/Http/routes.php');
        }

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/config.php' => config_path('laravel-schemacrawler.php'),
            ], 'config');

            // Registering package commands.
            $this->commands([SchemaCrawlerCommand::class]);
        }
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register(): void
    {
        // Automatically apply the package configuration
        $this->mergeConfigFrom(__DIR__.'/../config/config.php', 'laravel-schemacrawler');

        // Register the main class to use with the facade
        $this->app->singleton('laravel-schemacrawler', function () {
            return new LaravelSchemaCrawler;
        });
    }
}
