<?php

namespace App\Controller;

use App\Model\Delete;

class Deletar {

    /**
     * Filtra o id que vem pela requisição get,
     * instancia a model de remoção,
     * verifica se a remoção do produto foi bem sucedida,
     * retorna para página de produtos com mensagem adequada em ambos os casos
     *
     * @return void
     */
    public function processaRequisicao() {
        $id = filter_input(
            INPUT_GET,
            'id',
            FILTER_VALIDATE_INT
        );

        if (!$id) {
            echo '
            <script>
                alert("Não foi possível excluir!");
                window.location.href = "/produtos";
            </script>
            ';
            exit();
        }

        $delete = new Delete();

        if (!$delete->removeDados($id)) {
            echo '
            <script>
                alert("Erro de remoção do produto!");
                window.location.href = "/produtos";
            </script>
            ';
            exit();
        }

        echo '
            <script>
                alert("Arquivo removido com sucesso!");
                window.location.href = "/produtos";
            </script>
        ';
    }
}