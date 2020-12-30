<?php

namespace SebaCarrasco93\Utilidades\Traits;

trait Strings
{
    function nombre(string $string)
    {
        $array = array_filter(explode(' ', $string));

        $array = array_values($array);

        foreach ($array as $nombre) {
            $limpio[] = ucfirst(strtolower($nombre));
        }

        return implode(' ', $limpio);
    }
}
