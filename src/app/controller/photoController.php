<?php

namespace Projeto\GaleriaDeFotos\App\Controller;

class PhotoController
{

    public function __construct()
    {
    }

    public static function galeria():void
    {
        require __DIR__ . '../../../public/view/body/galeria.php';
    }

}