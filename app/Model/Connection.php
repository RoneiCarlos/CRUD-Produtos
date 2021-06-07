<?php

namespace App\Model;

use PDO;

class Connection {

    //Objeto de conexão PDO
    private $connection;

    /**
     * Cria o objeto PDO de conexão com o banco de dados
     *
     * @return void
     */
    public function __construct()
    {
        return $this->connection = new PDO(
            'mysql:dbname=crud;host=localhost;charset=utf8',
            'root',
            'root'
        );
    }

    /**
     * Retorna o objeto PDO da conexão
     *
     * @return void
     */
    public function getConnection() :PDO
    {
        return $this->connection;
    }
}