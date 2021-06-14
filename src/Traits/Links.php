<?php

namespace SebaCarrasco93\Utilidades\Traits;

trait Links
{
    public function codificar_url(string $url)
    {
        return str_replace(' ', '%20', $url); // return urlencode($url);
    }

    public function link_waze(string $direccion)
    {
        return 'https://waze.com/ul?q=' . $this->codificar_url($direccion);
    }

    public function link_maps(string $direccion)
    {
        return 'https://www.google.com/maps/search/?api=1&query=' . $this->codificar_url($direccion);
    }

    public function link_whatsapp(string $texto = null, $numero = null)
    {
        $url = 'https://wa.me/';

        if ($numero) {
            $url = $url . str_replace('+', '', $numero);
        }

        if ($texto) {
            $url = $url . '?text=' . $this->codificar_url($texto);
        }

        if ($texto || $numero) {
            return $url;
        }
    }
}
