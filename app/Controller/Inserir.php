<?php
namespace App\Controller;

use App\Model\Create;

class Inserir {

    /**
     * Atribui os valores da requisição POST que vem do formulário à variáveis,
     * confere se o arquivo inserido é uma imagem,
     * passa elas para o método que faz a inserção dos dados no banco
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
            echo '
            <script>
                alert("Erro de inserção de dados!");
                window.location.href = "/produtos";
            </script>
            ';
            exit();
        }

        echo '
            <script>
                alert("Produto cadastrado com sucesso!");
                window.location.href = "/produtos";
            </script>
        ';
    }


}
