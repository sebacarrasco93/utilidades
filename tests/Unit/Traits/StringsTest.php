<?php

namespace SebaCarrasco93\Utilidades\Tests\Unit\Traits;

// use Utilidades;

use Orchestra\Testbench\TestCase;
use SebaCarrasco93\Utilidades\Facades\Utilidades;
use SebaCarrasco93\Utilidades\UtilidadesServiceProvider;


class StringsTest extends TestCase
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
    function devuelve_un_nombre_de_manera_correcta() {
        $nombre = 'sEbAstiáN';

        $formato = Utilidades::nombre($nombre);

        $this->assertEquals('Sebastián', $formato);
    }

    /** @test */
    function devuelve_nombre_completo_de_manera_correcta() {
        $nombre = 'sEbAstiáN Nicolás  carRascO     PoblEtE';

        $formato = Utilidades::nombre($nombre);

        $this->assertEquals('Sebastián Nicolás Carrasco Poblete', $formato);
    }

    /** @test */
    function los_tildes_se_dejan_en_minúscula_también() {
        $this->markTestSkipped('Falta ver cómo implementar');
        $nombre = 'NicolÁs';

        $formato = Utilidades::nombre($nombre);

        $this->assertEquals('Nicolás', $formato);
    }
}
