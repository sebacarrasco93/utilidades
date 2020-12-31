<?php

namespace SebaCarrasco93\Utilidades\Tests\Unit\Repositories;

use SebaCarrasco93\Utilidades\Repositories\Rut;
use SebaCarrasco93\Utilidades\Tests\TestCase;

class RutTest extends TestCase
{
    /** @test */
    function debe_conocer_su_valor_en_sucio() {
        $rut = new Rut('18.376.588-4');
        $this->assertEquals('18.376.588-4', $rut->rutSucio);
    }

    /** @test */
    function puede_filtrar_y_dejar_todos_los_digitos() {
        $rut = new Rut('s1e8b.3a7-6.5x8d8*,-4');
        $this->assertEquals('183765884', $rut->rutFiltrado);
    }

    /** @test */
    function conoce_la_cantidad_total_de_todos_los_digitos() {
        $rut = new Rut('18376588-4');
        $this->assertEquals(9, $rut->cantidadDigitos);

        $rut = new Rut('6.356.038-3');
        $this->assertEquals(8, $rut->cantidadDigitos);
    }

    /** @test */
    function puede_tener_ocho_o_nueve_digitos() {
        $rut = new Rut('18376588-4');
        $this->assertTrue($rut->cantidadDigitosValida);

        $rut = new Rut('6.356.038-3');
        $this->assertTrue($rut->cantidadDigitosValida);

        $rut = new Rut('18.376.58.84-4');
        $this->assertFalse($rut->cantidadDigitosValida);

        $rut = new Rut('1.6.5884-4');
        $this->assertFalse($rut->cantidadDigitosValida);
    }

    /** @test */
    function puede_tener_ocho_o_nueves_digitos() {
        $rut = new Rut('18376588-4');
        $this->assertTrue($rut->cantidadDigitosValida);

        $rut = new Rut('6.356.038-3');
        $this->assertTrue($rut->cantidadDigitosValida);

        $rut = new Rut('18.376.58.84-4');
        $this->assertFalse($rut->cantidadDigitosValida);

        $rut = new Rut('1.6.5884-4');
        $this->assertFalse($rut->cantidadDigitosValida);
    }

    /** @test */
    function puede_separar_los_digitos() {
        $rut = new Rut('18376588-4');

        $this->assertEquals(18376588, $rut->digitos);
        $this->assertEquals(4, $rut->digitoVerificador);
    }

    /** @test */
    function puede_validar_su_digito_verificador() {
        $rut = new Rut('18376588-4');
        $this->assertEquals(4, $rut->digitoVerificadorCalculado);

        $rut = new Rut('5717465-k');
        $this->assertEquals('K', $rut->digitoVerificadorCalculado);
    }

    /** @test */
    public function sabe_que_es_valido() {
        $rut = new Rut('18376588-4');

        $this->assertTrue($rut->esValido);
    }

    /** @test */
    public function sabe_que_es_invalido() {
        $rut = new Rut('18376588-2');

        $this->assertFalse($rut->esValido);
    }

    /** @test */
    function puede_no_contener_puntos() {
        $rut = new Rut('18376588-4');

        $this->assertEquals('18376588-4', $rut->salida);
    }

    /** @test */
    function puede_terminar_en_k() {
        $rut = new Rut('5717465-k');

        $this->assertEquals('5717465-K', $rut->salida);
    }

    /** @test */
    function puede_terminar_en_K_mayuscula() {
        $rut = new Rut('5.717.465-K');

        $this->assertEquals('5717465-K', $rut->salida);
    }
}
