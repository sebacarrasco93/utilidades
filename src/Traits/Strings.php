<?php

namespace SebaCarrasco93\Utilidades\Traits;

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
        $filtrado = preg_replace('/[^0-9kK]/', '', $string);

        $total_digitos = mb_strlen($filtrado);

        $digitosRut = mb_substr($filtrado, $total_digitos * -1, -1);
        $digitoVerificador = mb_strtoupper(mb_substr($filtrado, -1));

        if ($total_digitos == 8 || $total_digitos == 9) {
            return $digitosRut .  '-' . $digitoVerificador;
        }
    }
}
