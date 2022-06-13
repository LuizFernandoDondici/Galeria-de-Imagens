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

        $photoDAO = new PhotoDAO();
        
        $photos = $photoDAO->findPathImg();

        require __DIR__ . '../../../public/view/body/galeria.php';

    }


    public static function savePhoto():void
    {

        $name = $_FILES['img']['name'];
        $dir = $_ENV['DIR_IMG'];
        $file = $dir . $name;

        $photo = new Photo(null, $file, $name);

        $photoDAO = new PhotoDAO();
        $photoDAO->savePathImg($photo);

        move_uploaded_file($_FILES['img']['tmp_name'], $file); 
        
    }


    public static function deletePhoto():void
    {

        $id = $_GET['id'];

        $photoDAO = new PhotoDAO();
        $p = $photoDAO->findPathImgById($id);

        $photo = new Photo($p["id_img"], $p["path_img"], $p["name_img"]);

        $photoDAO->deletePathImg($photo);

        unlink($photo->getPath());

    }

}