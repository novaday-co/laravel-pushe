<?php

namespace NovadayCo\LaravelPushe;

use Illuminate\Support\ServiceProvider;

class PusheServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/pushe.php', 'pushe'
        );
    }

    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/pushe.php' => config_path('pushe.php'),
        ]);
    }
}