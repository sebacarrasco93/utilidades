<?php

namespace SebaCarrasco93\Utilidades\Tests\Unit\Traits;

// use Utilidades;

use Orchestra\Testbench\TestCase;
use SebaCarrasco93\Utilidades\Facades\Utilidades;
use SebaCarrasco93\Utilidades\UtilidadesServiceProvider;


class IntegersTest extends TestCase
{ 
    protected function getPackageProviders($app)
    {
        return [
            UtilidadesServiceProvider::class,
        ];
    }

    protected function getPackageAliases($app)
    {
        return [
            'Utilidades' => Utilidades::class,
        ];
    }

    /** @test */
    function devuelve_pesos_chilenos_con_simbolos_y_puntos() {
        $numero = 1500;

        $formato = Utilidades::peso_chileno($numero);

        $this->assertEquals('$1.500', $formato);
    }
}
