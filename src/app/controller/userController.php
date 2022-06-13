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

}