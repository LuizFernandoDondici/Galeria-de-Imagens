<?php

namespace Projeto\GaleriaDeFotos\App\Controller;

class ErrorController
{

    public function __construct()
    {
    }


    public static function error():void
    {
        require __DIR__ . '../../../public/view/body/error.php';
    }

}