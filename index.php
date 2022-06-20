<?php

require __DIR__ . '../vendor/autoload.php';

use Projeto\GaleriaDeFotos\Route\Route;


$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();


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
