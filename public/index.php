<?php

include __DIR__.'/../vendor/autoload.php';

use App\Controller\CadastrarProduto;
use App\Controller\Erro404;
use App\Controller\ListarProdutos;

if(!isset($_SERVER['PATH_INFO']))  {
    $controller = new ListarProdutos();
    $controller->processaRequisicao();
    exit();
}

switch ($_SERVER["PATH_INFO"]) {

    case "/":
        $controller = new ListarProdutos();
        $controller->processaRequisicao();
        break;
    
    case "/novo-produto":
        $controller = new CadastrarProduto();
        $controller->processaRequisicao();
        break;

    case "/produtos":
        $controller = new ListarProdutos();
        $controller->processaRequisicao();
        break;

    default: 
        $controller = new Erro404();
        $controller->processaRequisicao();
        break;
}
