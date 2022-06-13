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

            $insertQuery = 'INSERT INTO galeria (path_img, name_img) VALUES (?, ?)';

            $stmt = $this->conn->prepare($insertQuery);
            $stmt->bindParam(1, $photo->getPath());
            $stmt->bindParam(2, $photo->getName());
    
            return $stmt->execute();

        } catch (\Throwable $th) {
            echo 'erro insert';
        }
    }


    public function findPathImg():array
    {
        try {
            
            $selectQuery = 'SELECT * FROM galeria;';

            $stmt = $this->conn->prepare($selectQuery);
            $stmt->execute();

            $listPhotos = $stmt->fetchAll(); 

            return $listPhotos;

        } catch (\Throwable $th) {
            echo 'erro select';
        }
    }


    public function findPathImgById($id):array
    {
        try {
            
            $selectQuery = 'SELECT * FROM galeria WHERE id_img = ?;';

            $stmt = $this->conn->prepare($selectQuery);

            $stmt->bindParam(1, $id);
            $stmt->execute();

            $photo = $stmt->fetch(); 

            return $photo;

        } catch (\Throwable $th) {
            echo 'erro select';
        }
    }

    public function deletePathImg(Photo $photo):bool
    {
        try {
            
            $deleteQuery = 'DELETE FROM galeria WHERE id_img = ?';

            $stmt = $this->conn->prepare($deleteQuery);
            $stmt->bindParam(1, $photo->getId());

            return $stmt->execute();

        } catch (\Throwable $th) {
            echo 'erro delete';
        }
    }

}