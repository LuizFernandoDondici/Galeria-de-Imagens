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

        // Renderiza para pagina '/galeria' com um array de fotos.
        require __DIR__ . '../../../public/view/body/gallery.php';
    }


    public static function savePhoto():void
    {

        $dir = $_ENV['DIR_IMG'];
        $file = $_ENV['FILE'];
        
        $idUser =  $_SESSION['id_user'];
        
        $nameTemp = $_FILES['img']['tmp_name'];

        // Identifica a extensão do arquivo.
        $ext = pathinfo($_FILES['img']['name'], PATHINFO_EXTENSION);
        // Nomeia o arquivo com string numeral randomica concatenado com a extensão. 
        $name = md5(uniqid(time())) .'.'. $ext; 
        // Cria o caminho do arquivo concatenando o diretorio com o nome criado.
        $path = $dir . $name; 
        
        $photo = new Photo(null, $path, $name, $idUser);
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

            // Cria pasta caso não exista.
            if (!file_exists($file)) {
                mkdir($file);
            }

            // Salva arquivo para pasta criada.
            move_uploaded_file($nameTemp, $path); 

            // Apaga o Body.
            ob_clean();
            // Remove o header.
            header_remove(); 
            // Retorna Objeto JSON.
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

        // Deleta imagem da pasta.
        unlink($photo['path_photo']);

        $photoDAO->deletePhotoById($id);

        // Atualiza pagina.
        header('Location: /galeria');
    }

}