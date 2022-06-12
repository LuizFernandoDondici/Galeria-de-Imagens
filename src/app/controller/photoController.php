<?php

namespace Projeto\GaleriaDeFotos\App\Controller;

use Projeto\GaleriaDeFotos\App\Model\PhotoModal\Photo;
use Projeto\GaleriaDeFotos\App\Model\PhotoModal\PhotoDAO;

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

        $dir = $_ENV['DIR_IMG'];
        $file = $dir . basename($_FILES['img']['name']);

        $photo = new Photo(null, $file);

        $photoDAO = new PhotoDAO();
        $photoDAO->savePathImg($photo);

        move_uploaded_file($_FILES['img']['tmp_name'], $file); 
        
    }

}