<?php

namespace App\Model;
use PDO;

class Read {

    //Objeto de conexão PDO
    private $conexao;

    /**
     * Cria o objeto PDO de conexão com o banco de dados
     *
     * @return void
     */
    public function __construct()
    {
        $this->conexao = new PDO(
            'mysql:dbname=crud;host=localhost;charset=utf8',
            'root',
            'root'
        );
    }

    /**
     * Prepara e executa a query para listar todos os produtos,
     * retorna os dados dos produtos
     *
     * @return array
     */
    public function processaRequisicao() :array
    {
        $stmt = $this->conexao->query(
            'SELECT * FROM produtos ORDER BY id DESC'
        );
        $stmt->execute();
        $produtos = $stmt->fetchAll(
            PDO::FETCH_ASSOC
        );
        return $produtos;
    }
}