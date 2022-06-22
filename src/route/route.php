<?php

namespace Projeto\GaleriaDeFotos\Route;

use Projeto\GaleriaDeFotos\App\Controller\ErrorController;
use Projeto\GaleriaDeFotos\App\Controller\PhotoController;
use Projeto\GaleriaDeFotos\App\Controller\UserController;

class Route
{

    public function setRoute($path):void
    {
        if ($path == '/login' || $path == '' || $path == null) {
            ob_clean();
            UserController::login();
        }
        
        if ($path == '/salvar-acesso') {
            UserController::saveUser();
        }

        if ($path == '/logar') {
            UserController::loginto();
        }
        if ($path == '/deslogar') {
            UserController::logout();
        }

        if ($path == '/galeria') {
            PhotoController::gallery();
        }

        if ($path == '/salvar-foto') {
            PhotoController::savePhoto();
        }

        if ($path == '/deletar-foto') {
            PhotoController::deletePhoto();
        }

        if ($path == '/erro') {
            ErrorController::error();
        }
    }


    public function validateRoute($path):bool
    {
        if($path === '/logar' || $path === '/salvar-acesso'){
            return true;
        }

        return false;
    }

}