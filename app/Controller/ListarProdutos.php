<?php

namespace App\Controller;

use App\Model\Read;
use PDO;

class ListarProdutos {

    /**
     * Requisita todos os dados da tabela de produtos,
     * filtra o retorno em forma de array associativo e
     * requisita a view onde os produtos são listados
     *
     * @return void
     */
    public function processaRequisicao()
    {
        $stmt = new Read();
        $produtos = $stmt->processaRequisicao();

        require __DIR__.'/../View/ListarProdutos.php';
    }
}
