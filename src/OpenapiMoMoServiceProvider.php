<?php

namespace Escarter\OpenapiMoMo;

use Illuminate\Support\ServiceProvider;

class OpenapiMoMoServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'OpenapiMoMo', function () {
                return new OpenapiMoMo();
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
