<?php

require __DIR__ . '../../vendor/autoload.php';
require __DIR__ . '../../env.php';

use Projeto\GaleriaDeFotos\Route\Route;


// Destroi Sessão se ela existir.
if (isset($_SESSION)) {
    session_destroy();
}

// Cria Sessão.
session_start();


$route = new Route();

// Verifica Rotas.
if ($route->validateRoute($_SERVER['PATH_INFO'])) {
    $route->setRoute($_SERVER['PATH_INFO']);
    exit; 
}

// Verifica Sessão e Rota para não renderizar caso não tenha login feito.
if(!isset($_SESSION['released']) && $_SERVER['PATH_INFO'] != '/login') {
    header('Location: /login');
} 

$route->setRoute($_SERVER['PATH_INFO']);

