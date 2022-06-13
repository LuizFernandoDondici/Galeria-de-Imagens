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
            
            $insertQuery = "INSERT INTO login (email_login, pass_login) VALUES (?, ?)";

            $stmt = $this->conn->prepare($insertQuery);
            
            $stmt->bindParam(1, $user->getEmail());
            $stmt->bindParam(2, password_hash($user->getPass(), PASSWORD_ARGON2I));

            return $stmt->execute();

        } catch (\Throwable $th) {
            echo 'erro save-user';
        }
    }

}