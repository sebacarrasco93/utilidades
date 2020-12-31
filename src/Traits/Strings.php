<?php

namespace SebaCarrasco93\Utilidades\Traits;

use SebaCarrasco93\Utilidades\Repositories\Rut;

trait Strings
{
    function mb_ucfirst($string, $encoding = 'UTF-8')
    {
        $firstChar = mb_substr($string, 0, 1, $encoding);
        $then = mb_substr($string, 1, null, $encoding);

        return mb_strtoupper($firstChar, $encoding) . $then;
    }

    public function nombre(string $string)
    {
        $array = array_filter(explode(' ', $string));

        $array = array_values($array);

        foreach ($array as $nombre) {
            $limpio[] = $this->mb_ucfirst(mb_strtolower($nombre));
        }

        return implode(' ', $limpio);
    }

    public function p_nombre(string $string)
    {
        $array = array_filter(explode(' ', $string));

        $array = array_values($array);

        return $this->nombre($array[0]);
    }

    public function rut(string $string)
    {
        $claseRut = new Rut($string);
        
        return $claseRut->salida;
    }
}
