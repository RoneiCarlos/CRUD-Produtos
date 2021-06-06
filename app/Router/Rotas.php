<?php

use App\Controller\Atualizar;
use App\Controller\CadastrarProduto;
use App\Controller\Deletar;
use App\Controller\Editar;
use App\Controller\Inserir;
use App\Controller\ListarProdutos;

/**
 * retorna um array com a rota associada à respectiva classe
 */
return [
    '/produtos' => ListarProdutos::class,
    '/cadastro' => CadastrarProduto::class,
    '/salvar-produto' => Inserir::class,
    '/excluir-produto' => Deletar::class,
    '/editar-produto' => Editar::class,
    '/atualizar-produto' => Atualizar::class
];