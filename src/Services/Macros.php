<?php

namespace SebaCarrasco93\Utilidades\Services;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Vite;

class Macros
{
    public static function register()
    {
        Route::macro('currentRouteNameHas', function (string $nombre_ruta) {
            return str_contains(Route::currentRouteName(), $nombre_ruta);
        });

        Vite::macro('img', function (string $nombre_imagen) {
            return Vite::asset("resources/img/{$nombre_imagen}");
        });
    }
}
