<?php

require __DIR__ . '../vendor/autoload.php';

use Projeto\GaleriaDeFotos\Route\Route;

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$route = new Route();
$route->setRoute($_SERVER['PATH_INFO']);
