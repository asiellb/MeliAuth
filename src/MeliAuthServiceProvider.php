<?php

namespace Farena\MeliAuth;

use Illuminate\Support\ServiceProvider;

class MeliAuthServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/routes/web.php');
        $this->mergeConfigFrom(
            __DIR__.'/config/MeliAuth.php', 'MeliAuth'
        );
        $this->publishes([
            __DIR__.'/config' => config_path('MeliAuth.php'),
        ]);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
