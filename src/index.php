<?php

require __DIR__ . '../../vendor/autoload.php';

use Projeto\GaleriaDeFotos\Route\Route;

$route = new Route();

$route->setRoute($_SERVER['PATH_INFO']);
