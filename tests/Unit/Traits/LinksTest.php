<?php

namespace SebaCarrasco93\Utilidades\Tests\Unit\Traits;

// use SebaCarrasco93\Utilidades\Repositories\Rut;
use SebaCarrasco93\Utilidades\Tests\TestCase;
use Utilidades;

class LinksTest extends TestCase
{
    protected function setUp() : void
    {
        parent::setUp();
    
        $this->direccion = 'Calle de mi casa 10000, Rancagua';
    }

    /** @test */
    function codifica_a_formato_url() {
        $formato = Utilidades::codificar_url($this->direccion);

        $this->assertEquals('Calle%20de%20mi%20casa%2010000,%20Rancagua', $formato);
    }

    /** @test */
    function crea_link_de_waze() {
        $formato = Utilidades::link_waze($this->direccion);

        $this->assertEquals(
            'https://waze.com/ul?q=Calle%20de%20mi%20casa%2010000,%20Rancagua',
            $formato
        );
    }

    /** @test */
    function crea_link_de_maps() {
        $formato = Utilidades::link_maps($this->direccion);

        $this->assertEquals(
            'https://www.google.com/maps/search/?api=1&query=Calle%20de%20mi%20casa%2010000,%20Rancagua',
            $formato
        );
    }

    /** @test */
    function crea_link_de_whatsapp_con_texto_sin_numero() {
        $mensaje = 'Hola, quiero consultar por algo!';

        $formato = Utilidades::link_whatsapp($mensaje);

        $this->assertEquals(
            'https://wa.me/?text=Hola,%20quiero%20consultar%20por%20algo!',
            $formato
        );
    }

    /** @test */
    function crea_link_de_whatsapp_con_texto_con_numero() {
        $mensaje = 'Hola, quiero consultar por algo!';
        $numero = '+56900000000';

        $formato = Utilidades::link_whatsapp($mensaje, $numero);

        $this->assertEquals(
            'https://wa.me/56900000000?text=Hola,%20quiero%20consultar%20por%20algo!',
            $formato
        );
    }

    /** @test */
    function crea_link_de_whatsapp_sin_texto_con_numero() {
        $numero = '+56900000000';

        $formato = Utilidades::link_whatsapp(null, $numero);

        $this->assertEquals(
            'https://wa.me/56900000000',
            $formato
        );
    }

    /** @test */
    function no_crea_link_de_whatsapp_sin_texto_sin_numero() {
        $formato = Utilidades::link_whatsapp(null, null);

        $this->assertNull(
            $formato
        );
    }
}
