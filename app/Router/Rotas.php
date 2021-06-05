<?php

use App\Controller\CadastrarProduto;
use App\Controller\Deletar;
use App\Controller\Inserir;
use App\Controller\ListarProdutos;

/**
 * retorna um array com a rota associado à respectiva classe
 */
return [
    '/produtos' => ListarProdutos::class,
    '/cadastro' => CadastrarProduto::class,
    '/salvar-produto' => Inserir::class,
    '/excluir-produto' => Deletar::class
];