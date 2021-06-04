<?php

namespace App\Controller;

class Erro404 {

    /**
     * Requisita a view de página não encontrada
     *
     * @return void
     */
    public function processaRequisicao() :void
    {
        require __DIR__.'/../View/Erro404.php';
    }
}
