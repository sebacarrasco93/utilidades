<?php

namespace SebaCarrasco93\Utilidades\Tests\Unit\Traits;

use Utilidades;
use SebaCarrasco93\Utilidades\Tests\TestCase;

class StringsTest extends TestCase
{
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
        $nombre = 'NicolÁs';

        $formato = Utilidades::nombre($nombre);

        $this->assertEquals('Nicolás', $formato);
    }

    /** @test */
    function el_rut_puede_tener_ocho_digitos_en_total() {
        $rut = '183765-8';

        $formato = Utilidades::rut($rut);

        $this->assertNull($formato);
    }

    /** @test */
    function el_rut_puede_tener_nueve_digitos_en_total() {
        $rut = '183765884-0';

        $formato = Utilidades::rut($rut);

        $this->assertNull($formato);
    }

    /** @test */
    function el_rut_puede_no_contener_puntos() {
        $rut = '18376588-4';

        $formato = Utilidades::rut($rut);

        $this->assertEquals('18376588-4', $formato);
    }

    /** @test */
    function el_rut_puede_contener_puntos() {
        $rut = '18.376.588-4';

        $formato = Utilidades::rut($rut);

        $this->assertEquals('18376588-4', $formato);
    }

    /** @test */
    function el_rut_puede_terminar_en_k() {
        $rut = '5717465-k';

        $formato = Utilidades::rut($rut);

        $this->assertEquals('5717465-K', $formato);
    }

    /** @test */
    function el_rut_puede_terminar_en_K_mayuscula() {
        $rut = '5.717.465-K';

        $formato = Utilidades::rut($rut);

        $this->assertEquals('5717465-K', $formato);
    }
}
