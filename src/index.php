<?php

require __DIR__ . '../../vendor/autoload.php';
require __DIR__ . '../../env.php';

use Projeto\GaleriaDeFotos\Route\Route;

if (isset($_SESSION)) {
    session_destroy();
}

session_start();

$route = new Route();

if ($route->validateRoute($_SERVER['PATH_INFO'])) {
    $route->setRoute($_SERVER['PATH_INFO']);
    exit; 
}

if(!isset($_SESSION['released']) && $_SERVER['PATH_INFO'] != '/login') {
    header('Location: /login');
} 

$route->setRoute($_SERVER['PATH_INFO']);
