<?php

namespace App\Model;

use PDO;
use App\Model\Connection;

class Update {

    //Objeto de conexão PDO
    private $conexao;

    /**
     * Instancia o objeto PDO de conexão com o banco de dados
     *
     * @return void
     */
    public function __construct()
    {
        $this->conexao = new Connection();
        $this->conexao = $this->conexao->getConnection();
    }

    /**
     * Retorna os dados do produto de acordo com o id vindo enviado url
     *
     * @param int $id
     * @return array
     */
    public function getDados($id) :array
    {
        $stmt = $this->conexao->prepare(
            'SELECT * FROM produtos WHERE id = :id'
        );
        $this->id = $id;
        $stmt->bindParam(':id', $this->id);
        $stmt->execute();
        $produto = $stmt->fetch(
            PDO::FETCH_ASSOC
        );
        return $produto;
    }

    /**
     * Recebe os novos dados a serem atualizados no produto de acordo com o id
     *
     * @param int $id
     * @param string $nome
     * @param string $descricao
     * @param int $imagem (binário)
     * @return boolean
     */
    public function setDados($id, $nome, $descricao, $imagem) :bool
    {
        $sql = 'UPDATE produtos SET nome = :nome, descricao = :descricao, imagem = :imagem WHERE id = :id';
        
        if (!$imagem) {
            $sql = 'UPDATE produtos SET nome = :nome, descricao = :descricao WHERE id = :id';
        }

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':descricao', $descricao);
        if ($imagem) {
            $stmt->bindParam(':imagem', $imagem);
        }
        $stmt->bindParam(':id', $id);

        return $stmt->execute();
    }


}