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

    public static function savePhoto():void
    {

        var_dump($_FILES);

        $uploaddir = $_ENV['DIR_IMG'];
        $uploadfile = $uploaddir . basename($_FILES['img']['name']);

        move_uploaded_file($_FILES['img']['tmp_name'], $uploadfile); 
        
    }
}