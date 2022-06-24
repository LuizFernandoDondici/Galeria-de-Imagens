<?php

namespace Projeto\GaleriaDeFotos\App\Controller;

class ErrorController
{

    public function __construct()
    {
    }


    public static function error():void
    {
        
        // Renderiza para pagina '/erro'.
        require __DIR__ . '../../../public/view/body/error.php';
    }

}