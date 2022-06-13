<?php

namespace Projeto\GaleriaDeFotos\App\Controller;

class UserController
{

    public function __construct()
    {
    }


    public static function login():void
    {
        require __DIR__ . '../../../public/view/body/login.php';
    }

}