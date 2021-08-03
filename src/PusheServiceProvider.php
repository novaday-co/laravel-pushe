<?php

namespace NovadayCo\LaravelPushe;

use Illuminate\Support\ServiceProvider;

class PusheServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/Pushe.php', 'Pushe'
        );
    }

    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/Pushe.php' => config_path('Pushe.php'),
        ]);
    }
}