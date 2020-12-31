<?php

namespace SebaCarrasco93\Utilidades\Repositories;

class Rut
{
    public $rutSucio;
    public $rutFiltrado;
    public $cantidadDigitos;
    public $cantidadDigitosValida;
    
    public $digitos;
    public $digitoVerificador;
    
    public $digitoVerificadorCalculado;
    public $esValido = false;

    public $salida;

    function __construct($rutSucio)
    {
        $this->rutSucio = $rutSucio;

        $this->trabajar();
    }

    public function trabajar()
    {
        $this->rutFiltrado = $this->filtrarDigitos();
        $this->cantidadDigitos = $this->contarDigitos();
        $this->cantidadDigitosValida = $this->verificarCuentaDigitos();

        // Asignados automáticamente
        if ($this->cantidadDigitosValida) {
            $this->separarDigitos();
            $this->calcularDigitoVerificador();
            $this->comprobarSiEsValido();
            $this->calcularSalida();
        }
    }

    public function filtrarDigitos()
    {
        return preg_replace('/[^0-9kK]/', '', $this->rutSucio);
    }

    public function contarDigitos()
    {
        return mb_strlen($this->rutFiltrado);
    }

    public function verificarCuentaDigitos()
    {
        if ($this->cantidadDigitos == 8 || $this->cantidadDigitos == 9) {
            return true;
        }

        return false;
    }

    public function separarDigitos()
    {
        $this->digitos = mb_substr($this->rutFiltrado, $this->cantidadDigitos * -1, -1);
        $this->digitoVerificador = mb_strtoupper(mb_substr($this->rutFiltrado, -1));
    }

    public function calcularDigitoVerificador()
    {
        $digitos_rut = $this->digitos;

        $m = 0;
        $s = 1;

        for(null; $digitos_rut; $digitos_rut=floor($digitos_rut/10)) {
            $s = ($s + $digitos_rut % 10 * (9 - $m++%6)) % 11;
        }

        $this->digitoVerificadorCalculado = $s ? $s - 1 : 'K';
    }

    public function comprobarSiEsValido()
    {
        $this->esValido = $this->digitoVerificadorCalculado == $this->digitoVerificador;
    }

    public function calcularSalida()
    {
        $this->salida = $this->digitos . '-' . $this->digitoVerificador;
    }
}
