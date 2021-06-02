<?php

namespace App\Controller;

class Erro404
{

    public function processaRequisicao()
    {
        require __DIR__.'/../View/Erro404.php';
    }
}
