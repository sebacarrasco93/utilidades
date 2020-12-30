<?php

namespace SebaCarrasco93\Utilidades\Tests\Unit\Traits;

use Utilidades;
use SebaCarrasco93\Utilidades\Tests\TestCase;

class IntegersTest extends TestCase
{
    /** @test */
    function devuelve_pesos_chilenos_con_simbolos_y_puntos() {
        $numero = 1500;

        $formato = Utilidades::peso_chileno($numero);

        $this->assertEquals('$1.500', $formato);
    }
}
