<?php

namespace App\Model;

use PDO;

class Create {

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
     * Insere os dados no banco e retorna a execução
     *
     * @param string $nome
     * @param string $descricao
     * @param int $imagem (binário)
     * @return boolean
     */
    public function setDados($nome, $descricao, $imagem) :bool
    {
        $stmt = $this->conexao->prepare(
            'INSERT INTO produtos(nome, descricao, imagem)
             VALUES (:nome, :descricao, :imagem)'
        );
        $stmt->bindParam(":nome", $nome);
        $stmt->bindParam(":descricao", $descricao);
        $stmt->bindParam(":imagem", $imagem);
        return $stmt->execute();
    }
}

