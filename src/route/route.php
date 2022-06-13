<?php

namespace Projeto\GaleriaDeFotos\Route;

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
        
        if ($path == '/galeria') {
            PhotoController::galeria();
        }

        if ($path == '/salvar-foto') {
            PhotoController::savePhoto();
        }

        if ($path == '/deletar-foto') {
            PhotoController::deletePhoto();
        }

    }

}