<?php

namespace Projeto\GaleriaDeFotos\App\Model\UserModal;

use Projeto\GaleriaDeFotos\App\Config\Connect;

class UserDAO
{

    private $conn;

    public function __construct()
    {
        $this->conn = Connect::createConnection();
    }


    public function createUser(User $user):bool
    {
        try {
            
            $insertQuery = "INSERT INTO user (email_user, pass_user) VALUES (?, ?)";

            $stmt = $this->conn->prepare($insertQuery);
            
            $stmt->bindParam(1, $user->getEmail());
            $stmt->bindParam(2, password_hash($user->getPass(), PASSWORD_ARGON2I));

            return $stmt->execute();

        } catch (\Throwable $th) {
            echo 'erro save-user';
        }
    }


    public function findUser(User $user):int
    {
        try {
            
            $selectQuery = "SELECT * FROM user WHERE email_user = ?";

            $stmt = $this->conn->prepare($selectQuery);

            $stmt->bindParam(1, $user->getEmail());

            $stmt->execute();

            $dataUser = $stmt->fetch();
 
            if (password_verify($user->getPass(), $dataUser['pass_user'])) {

                return $dataUser['id_user'];

            } else {

                return 0;
            }

        } catch (\Throwable $th) {
            echo 'erro find-user';
        }
    }

}