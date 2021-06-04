<?php
namespace App\Controller;

use App\Model\Create;
use PDO;

class Inserir {

    //Objeto de conexão PDO
    private $conexao;

    /**
     * Cria o objeto PDO de conexão com o banco de dados
     *
     * @return void
     */
    public function __construct()
    {
        $this->conexão = new PDO(
            'mysql:dbname=crud;host=localhost;charset=utf8',
            'root',
            'root'
        );
    }

    /**
     * Atribui os valores da requisição POST que vem do formulário à variáveis,
     * confere se o arquivo inserido é uma imagem,
     * passa elas para o método que faz a inserção dos dados do banco
     *
     * @return void
     */
    public function processaRequisicao()
    {
        $nome = filter_input(
            INPUT_POST,
            'nome',
            FILTER_SANITIZE_STRING
        );

        $descricao = filter_input(
            INPUT_POST,
            'descricao',
            FILTER_SANITIZE_STRING
        );

        $tipo = explode('/',$_FILES['imagem']['type']);

        if ($tipo[0] !== 'image') {
            echo '
            <script>
                alert("Arquivo enviado não é uma imagem. Tente novamente!");
                history.back();
            </script>
            ';
            exit();
        }

        $imagem = file_get_contents($_FILES['imagem']['tmp_name']);

        $insert = new Create();
        
        if (!$insert->setDados($nome, $descricao, $imagem)) {
            echo "Erro de inserção de dados no banco!";
            exit();
        }

        echo '
            <script>
                alert("Arquivo cadastrado com sucesso!");
                window.location.href = "/produtos";
            </script>
        ';
    }


}