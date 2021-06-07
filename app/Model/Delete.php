<?php

namespace App\Model;

use App\Model\Connection;

class Delete {
    
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
     * Confere se o id requisitado para exclusão existe,
     * prepara e executa a query de remoção,
     * retorna a execução da query
     *
     * @param int $id
     * @return boolean
     */
    public function removeDados($id) :bool
    {
        $stmt = $this->conexao->prepare(
            'SELECT id FROM produtos WHERE id = :id'
        );
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        if(!$stmt->rowCount()) {
            return false;
            exit();
        }

        $stmt = $this->conexao->prepare(
            'DELETE FROM produtos WHERE id = :id'
        );
        $stmt->bindParam(':id', $id);

        return $stmt->execute();
    }
}