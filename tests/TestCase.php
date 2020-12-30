<?php

namespace SebaCarrasco93\Utilidades\Tests;

use Orchestra\Testbench\TestCase as TestCaseBase;
use SebaCarrasco93\Utilidades\Facades\Utilidades;
use SebaCarrasco93\Utilidades\UtilidadesServiceProvider;

class TestCase extends TestCaseBase
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
}
