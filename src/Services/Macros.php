<?php

namespace SebaCarrasco93\Utilidades\Services;

use Illuminate\Support\Facades\Route;

class Macros
{
    public static function register()
    {
        Route::macro('currentRouteNameHas', function (string $name) {
            return str_contains(Route::currentRouteName(), $name);
        });
    }
}
