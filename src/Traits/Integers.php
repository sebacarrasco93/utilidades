<?php

namespace SebaCarrasco93\Utilidades\Traits;

trait Integers
{
    function peso_chileno(int $numero)
    {
        return '$' . number_format($numero, 0, '', '.');
    }
}
