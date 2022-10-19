<?php

namespace SebaCarrasco93\Utilidades\Tests\Unit\Traits;

use SebaCarrasco93\Utilidades\Repositories\Rut;
use SebaCarrasco93\Utilidades\Tests\TestCase;
use Utilidades;

class StringsTest extends TestCase
{
    /** @test: Extraer a un Helper */
    function devuelve_tildes_y_enyes_en_mayusculas() {
        $nombre = 'á é í ó ú ñ';

        $formato = Utilidades::nombre($nombre);

        $this->assertEquals('Á É Í Ó Ú Ñ', $formato);
    }

    /** @test */
    function espacios_borra_los_espacios_sobrantes() {
        $texto = 'este  es  un  texto    mal  separado';

        $formato = Utilidades::espacios($texto);

        $this->assertEquals('este es un texto mal separado', $formato);
    }

    /** @test */
    function espacios_borra_los_espacios_sobrantes_y_devuelve_cada_palabra_como_array() {
        $texto = 'este  es  un  texto    mal  separado';

        $formato = Utilidades::espacios($texto, true);

        $this->assertEquals('este', $formato[0]);
        $this->assertEquals('es', $formato[1]);
        $this->assertEquals('un', $formato[2]);
        $this->assertEquals('texto', $formato[3]);
        $this->assertEquals('mal', $formato[4]);
        $this->assertEquals('separado', $formato[5]);
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
    public function devuelve_el_primer_nombre() {
        $nombre = 'sEbAstiáN   Carrasco       pobLetE';

        $formato = Utilidades::p_nombre($nombre);

        $this->assertEquals('Sebastián', $formato);
    }

    /** @test */
    function los_tildes_se_dejan_en_minúscula_también() {
        $nombre = 'NicolÁs';

        $formato = Utilidades::nombre($nombre);

        $this->assertEquals('Nicolás', $formato);
    }

    /** @test */
    function si_el_nombre_esta_vacio_devuelve_vacio() {
        $nombre = '';

        $formato = Utilidades::nombre($nombre);

        $this->assertEquals('', $formato);
    }
    
    /** @test */
    public function el_rut_debe_aplicar_todos_los_filtros_de_salida_de_su_clase() {
        $rut = '18.376.588-4';

        $formato = Utilidades::rut($rut);

        $this->assertEquals('18376588-4', $formato);
    }

    /** @test */
    function puede_generar_un_titulo_completo_sin_el_nombre_del_producto() {
        $titulo = 'Este es el título';

        $formato = Utilidades::titulo($titulo);

        $this->assertEquals('Este es el título', $formato);
    }

    /** @test */
    function puede_generar_un_titulo_completo_con_el_nombre_del_producto() {
        $titulo = 'Este es el título';

        $formato = Utilidades::titulo($titulo, 'Nombre del producto');

        $this->assertEquals('Este es el título | Nombre del producto', $formato);
    }
}
