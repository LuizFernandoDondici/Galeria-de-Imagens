<?php

namespace Projeto\GaleriaDeFotos\App\Controller;

use Projeto\GaleriaDeFotos\App\Model\PhotoModal\Photo;
use Projeto\GaleriaDeFotos\App\Model\PhotoModal\PhotoDAO;
use Projeto\GaleriaDeFotos\App\Model\PhotoModal\PhotoService;

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
        $photoService = new PhotoService();
        $photoDAO = new PhotoDAO();

        $validate = $photoService->validadePhoto($photo);

        if ($validate != '') {
            
            
            echo json_encode(
                array(
                    'success' => 0,
                    'msg' => $validate,
                )
            );

            exit;

        } else {

            $photoDAO->createPhoto($photo);

            move_uploaded_file($nameTemp, $file); 

            ob_clean();
            header_remove(); 
            echo json_encode(array(
                'success' => '1',
            ));

            exit;
        }        
    }


    public static function deletePhoto():void
    {

        $id = $_GET['id'];

        $photoDAO = new PhotoDAO();
        
        $photo = $photoDAO->findPhotoById($id);

        unlink($photo['path_photo']);

        $photoDAO->deletePhotoById($id);

        header('Location: /galeria');
        
    }

}