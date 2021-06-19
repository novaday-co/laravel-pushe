<?php

namespace FarazinCo\LaravelPushe;

use Illuminate\Support\ServiceProvider;

class PusheServiceProvider extends ServiceProvider
{
    public function register()
    {
       $this->publishes([
            __DIR__.'/../config/pushe.php' => config_path('pushe.php')
        ], 'config');
    }
}