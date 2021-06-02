<?php

namespace App\Controller;

use PDO;

class ListarProdutos
{

    public function processaRequisicao()
    {
        $conexao = new PDO(
            'mysql:dbname=crud;host=localhost;charset=utf8',
            'root',
            'root'
        );
        $stmt = $conexao->prepare(
            'SELECT * FROM produtos'
        );
        $stmt->execute();

        $produtos = $stmt->fetchAll(
            PDO::FETCH_ASSOC
        );

        require __DIR__.'/../View/ListarProdutos.php';
    }
}
