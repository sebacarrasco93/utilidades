<?php

namespace SebaCarrasco93\Utilidades;

use Illuminate\Support\ServiceProvider;
use SebaCarrasco93\Utilidades\Services\Macros;

class UtilidadesServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // 
    }

    public function register()
    {
        $this->app->bind('utilidades', function() {
            return new Utilidades;
        });

        Macros::register();
    }
}
