<?php

namespace App\Controller;

use App\Model\Update;

class Atualizar {
    
    /**
     * Filtra os dados das requisições get e post,
     * confere se foi inserida outra imagem para o produto,
     * envia os dados para serem atualizados no banco
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
                alert("Não é possível atualizar esse produto!");
                window.location.href = "/produtos";
            </script>
            ';
            exit();
        }

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

        if ($tipo[0] !== 'image' and $tipo[0] !== '') {
            echo '
            <script>
                alert("Arquivo enviado não é uma imagem. Tente novamente!");
                history.back();
            </script>
            ';
            exit();
        }

        $imagem = '';

        if ($tipo !== '') {
            $imagem = file_get_contents($_FILES['imagem']['tmp_name']);
        }

        $update = new Update();

        if(!$update->setDados($id, $nome, $descricao, $imagem)) {
            echo '
            <script>
                alert("Problema desconhecido ao atualizar dados desse produto");
                window.location.href = "/produtos";
            </script>
            ';
            exit();
        }

        echo '
        <script>
            alert("Produto atualizado com sucesso!");
            window.location.href = "/produtos";
        </script>
        ';
    }
}