<?php

namespace Projeto\GaleriaDeFotos\Route;

use Projeto\GaleriaDeFotos\App\Controller\PhotoController;

class Route
{

    public function setRoute($path):void
    {
        
        if ($path == '/galeria') {
            PhotoController::galeria();
        }

        if ($path == '/salvar-foto') {
            PhotoController::savePhoto();
        }

    }

}