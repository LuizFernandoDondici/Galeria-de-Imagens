<?php

namespace Projeto\GaleriaDeFotos\App\Model\UserModal;

use Projeto\GaleriaDeFotos\App\Config\Connect;

class UserDAO
{

    private $conn;

    public function __construct()
    {
        // Cria conexão com o Database.
        $this->conn = Connect::createConnection();
    }


    public function createUser(User $user):bool
    {
        try {

            // Armazena dados de login de usuario (e-mail e senha criptografada).
            
            $insertQuery = 'INSERT INTO user (email_user, pass_user) VALUES (?, ?)';

            $stmt = $this->conn->prepare($insertQuery);
            $stmt->bindParam(1, $user->getEmail());
            $stmt->bindParam(2, password_hash($user->getPass(), PASSWORD_ARGON2I));

            return $stmt->execute();

        } catch (\Throwable $th) {
            header('Location: /erro');
        }
    }


    public function findUser(User $user):int
    {
        try {

            // Busca usuario pelo seu e-mail.
            
            $selectQuery = 'SELECT * FROM user WHERE email_user = ?';
            
            $stmt = $this->conn->prepare($selectQuery);
            $stmt->bindParam(1, $user->getEmail());
            $stmt->execute();

            $dataUser = $stmt->fetch();

            // Verifica se senha informada e senha armazenada são iguais.
            if (password_verify($user->getPass(), $dataUser['pass_user'])) {

                return $dataUser['id_user'];
            } 

            return 0;
            
        } catch (\Throwable $th) {
            header('Location: /erro');
        }
    }


    public function findUserByEmail(User $user):int
    {
        try {

            // Busca usuario pelo seu e-mail.

            $selectQuery = 'SELECT * FROM user WHERE email_user = ?';

            $stmt = $this->conn->prepare($selectQuery);
            $stmt->bindParam(1, $user->getEmail());
            $stmt->execute();

            $dataUser = $stmt->fetch();

            // Verifica se e-mail informado e e-mail armazenado são iguais.
            if ($dataUser['email_user'] == $user->getEmail()) {
                
                return 1;
            }
            
            return 0;
    
        } catch (\Throwable $th) {
            header('Location: /erro');
        }
    }

}