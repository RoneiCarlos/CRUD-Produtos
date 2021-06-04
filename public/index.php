<?php

include __DIR__.'/../vendor/autoload.php';

use App\Controller\Erro404;

/**
 * Pega a url requisitada,
 * importa o arquivo de rotas da aplicação
 */
$caminho = $_SERVER["PATH_INFO"];
$rotas = require __DIR__.'/../app/Router/Rotas.php';

//se não existir a url nas rotas gera um 404
if (!array_key_exists($caminho, $rotas)) {
    $controller = new Erro404();
    $controller->processaRequisicao();
    exit();
}

/**
 * recebe a classe respectiva a requisição de url,
 * instancia a classe,
 * chama o metodo para processar a requisição
 */
$classeControladora = $rotas[$caminho];
$controller = new $classeControladora();
$controller->processaRequisicao();