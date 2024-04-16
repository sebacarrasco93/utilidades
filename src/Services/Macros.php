<?php

namespace SebaCarrasco93\Utilidades\Services;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Vite;

class Macros
{
    public static function register()
    {
        self::registerRouteMacros();

        if (class_exists(Vite::class)) {
            self::registerViteMacros();
        }
    }

    private static function registerRouteMacros()
    {
        Route::macro('currentRouteNameHas', function (string $nombre_ruta) {
            return str_contains(Route::currentRouteName(), $nombre_ruta);
        });
    }

    private static function registerViteMacros()
    {
        Vite::macro('asset', function (string $path) {
            return asset(Vite::asset($path));
        });
    }
}
