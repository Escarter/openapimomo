<?php

namespace Escarter\Openapimomo;

use Illuminate\Support\ServiceProvider;

class OpenapimomoServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'Openapimomo', function () {
                return new Openapimomo();
            }
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes(
            [
            __DIR__.'/config/openapimomo.php' => config_path('openapimomo.php')
             ], 'config'
        );
    }
}
