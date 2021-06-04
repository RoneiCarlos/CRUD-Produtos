<?php

use App\Controller\CadastrarProduto;
use App\Controller\Inserir;
use App\Controller\ListarProdutos;

return [
    '/produtos' => ListarProdutos::class,
    '/cadastro' => CadastrarProduto::class,
    '/salvar-produto' => Inserir::class
];