<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\Actors;

class gameServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->app->bind('App\Services\Actors', function ($app) {
            $services_game = new Actors();
            //echo "123";
          return $services_game;
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
