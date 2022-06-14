<?php

namespace Projeto\GaleriaDeFotos\App\Controller;

use Projeto\GaleriaDeFotos\App\Model\UserModal\User;
use Projeto\GaleriaDeFotos\App\Model\UserModal\UserDAO;

class UserController
{

    public function __construct()
    {
    }


    public static function login():void
    {
        require __DIR__ . '../../../public/view/body/login.php';
    }


    public static function saveUser():void
    {

        $email = $_POST['email'];
        $pass = $_POST['pass'];

        $user = new User(null, $email, $pass);
        $userDAO = new UserDAO();

        $userDAO->createUser($user);

    }


    public static function loginto():void
    {

        $email = $_POST['email'];
        $pass = $_POST['pass'];

        $user = new User(null, $email, $pass);
        $userDAO = new UserDAO();

        $idUser = $userDAO->findUser($user);

        if ($idUser != 0) {
            
            $_SESSION['liberado'] = true;
            $_SESSION['id_usuario'] = $idUser;
            
            header('Location: /galeria');
        }

    }

}