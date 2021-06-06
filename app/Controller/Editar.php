<?php

namespace App\Controller;

use App\Model\Update;

class Editar {

    /**
     * Filtra o id,
     * Recebe os dados de acordo com o id da url,
     * Chama a view do formulário onde os dados são exibidos
     *
     * @return void
     */
    public function processaRequisicao() :void
    {
        $id = filter_input(
            INPUT_GET,
            'id',
            FILTER_VALIDATE_INT
        );

        if (!$id) {
            echo '
            <script>
                alert("Não é possível editar esse produto!");
                window.location.href = "/produtos";
            </script>
            ';
            exit();
        }

        $update = new Update();

        $produto = $update->getDados($id);

        if(!$produto) {
            echo '
            <script>
                alert("Esse produto não existe.");
                window.location.href = "/produtos";
            </script>
            ';
            exit();
        }

        $id = $produto['id'];
        $nome = $produto['nome'];
        $descricao = $produto['descricao'];
        $imagem = $produto['imagem'];
        $editar = true;

        require __DIR__.'/../View/CadastrarProduto.php';
    }
}