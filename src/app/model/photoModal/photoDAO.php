<?php

namespace Projeto\GaleriaDeFotos\App\Model\PhotoModal;

use Projeto\GaleriaDeFotos\App\Config\Connect;

class PhotoDAO
{

    private $conn;

    public function __construct()
    {
        // Cria conexão com o Database.
        $this->conn = Connect::createConnection();
    }


    public function createPhoto(Photo $photo):bool
    {
        try {

            // Armazena foto.

            $insertQuery = 'INSERT INTO photo (path_photo, name_photo, id_user) VALUES (?, ?, ?)';

            $stmt = $this->conn->prepare($insertQuery);
            $stmt->bindParam(1, $photo->getPath());
            $stmt->bindParam(2, $photo->getName());
            $stmt->bindParam(3, $photo->getIdUser());
    
            return $stmt->execute();

        } catch (\Throwable $th) {
            header('Location: /erro');
        }
    }


    public function findPhotos():array
    {
        try {

            // Busca todas as fotos por usuario.
            
            $selectQuery = 'SELECT * FROM photo WHERE id_user = ?';

            $stmt = $this->conn->prepare($selectQuery);
            $stmt->bindValue(1, intval($_SESSION['id_user']));
            $stmt->execute();

            $listPhotos = $stmt->fetchAll(); 

            return $listPhotos;

        } catch (\Throwable $th) {
            header('Location: /erro');
        }
    }


    public function findPhotoById($id):array
    {
        try {

            // Busca foto por id.

            $selectQuery = 'SELECT * FROM photo WHERE id_photo = ?';

            $stmt = $this->conn->prepare($selectQuery);
            $stmt->bindParam(1, $id);
            $stmt->execute();

            $photo = $stmt->fetch(); 
            
            return $photo;

        } catch (\Throwable $th) {
            header('Location: /erro');
        }
    }

    public function deletePhotoById($id):bool
    {
        try {

            // Deleta foto por id.
            
            $deleteQuery = 'DELETE FROM photo WHERE id_photo = ?';

            $stmt = $this->conn->prepare($deleteQuery);
            $stmt->bindParam(1, $id);

            return $stmt->execute();

        } catch (\Throwable $th) {
            header('Location: /erro');
        }
    }

}