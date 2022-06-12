<?php

namespace Projeto\GaleriaDeFotos\App\Model\PhotoModal;

use Projeto\GaleriaDeFotos\App\Config\Connect;

class PhotoDAO
{

    private $conn;

    public function __construct()
    {
        $this->conn = Connect::createConnection();
    }


    public function savePathImg(Photo $photo):bool
    {
        try {

            $insertQuery = 'INSERT INTO galeria (path_img) VALUES (?)';

            $stmt = $this->conn->prepare($insertQuery);
            $stmt->bindParam(1, $photo->getPath());
    
            return $stmt->execute();

        } catch (\Throwable $th) {
            echo 'erro insert';
        }
    }

}