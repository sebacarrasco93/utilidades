<?php

namespace SebaCarrasco93\Utilidades\Traits;

trait Strings
{
    public function nombre(string $string)
    {
        $array = array_filter(explode(' ', $string));

        $array = array_values($array);

        foreach ($array as $nombre) {
            $limpio[] = ucfirst(mb_strtolower($nombre));
        }

        return implode(' ', $limpio);
    }

    public function rut(string $string)
    {
        $filtrado = preg_replace('/[^0-9kK]/', '', $string);

        $total_digitos = strlen($filtrado);

        $digitosRut = substr($filtrado, $total_digitos * -1, -1);
        $digitoVerificador = strtoupper(substr($filtrado, -1));

        if ($total_digitos == 8 || $total_digitos == 9) {
            return $digitosRut .  '-' . $digitoVerificador;
        }
    }
}
