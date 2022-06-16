<?php

namespace Projeto\GaleriaDeFotos\App\Controller;

use Projeto\GaleriaDeFotos\App\Model\PhotoModal\Photo;
use Projeto\GaleriaDeFotos\App\Model\PhotoModal\PhotoDAO;

class PhotoController
{

    public function __construct()
    {
    }


    public static function gallery():void
    {

        $photoDAO = new PhotoDAO();
        
        $photos = $photoDAO->findPhotos();

        require __DIR__ . '../../../public/view/body/gallery.php';

    }


    public static function savePhoto():void
    {

        $dir = $_ENV['DIR_IMG'];
        $name = $_FILES['img']['name'];
        $file = $dir . $name;
        $idUser =  $_SESSION['id_user'];
        $nameTemp = $_FILES['img']['tmp_name'];

        $photo = new Photo(null, $file, $name, $idUser);

        $photoDAO = new PhotoDAO();

        $photoDAO->createPhoto($photo);

        move_uploaded_file($nameTemp, $file); 

        ob_clean();
        header('Location: /galeria');
        
    }


    public static function deletePhoto():void
    {

        $id = $_GET['id'];

        $photoDAO = new PhotoDAO();
        
        $photo = $photoDAO->findPhotoById($id);

        $photoDAO->deletePhotoById($id);
  
        unlink($photo['path_photo']);

        ob_clean();
        header('Location: /galeria');
        
    }

}