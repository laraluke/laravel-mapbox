<?php

namespace LaraLuke\Mapbox;

use Illuminate\Support\ServiceProvider;

use LaraLuke\Mapbox\Console\ValidateTokenCommand;

class MapboxServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/mapbox.php' => config_path('mapbox.php'),
        ]);

        if ($this->app->runningInConsole()) {
            $this->commands([
                ValidateTokenCommand::class,
            ]);
        }
    }

    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/mapbox.php', 'mapbox'
        );
    }
}