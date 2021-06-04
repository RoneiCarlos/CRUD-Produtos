<?php

namespace App\Controller;

class CadastrarProduto
{

    /**
     * Requisita a view com o formulário de cadastro de produtos
     *
     * @return void
     */
    public function processaRequisicao()
    {
        require __DIR__.'/../View/CadastrarProduto.php';
    }
}
