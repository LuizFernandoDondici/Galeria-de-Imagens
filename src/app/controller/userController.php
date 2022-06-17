<?php

namespace Projeto\GaleriaDeFotos\App\Controller;

use Projeto\GaleriaDeFotos\App\Model\UserModal\User;
use Projeto\GaleriaDeFotos\App\Model\UserModal\UserDAO;
use Projeto\GaleriaDeFotos\App\Model\UserModal\UserService;

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

        $json = file_get_contents('php://input');
        $data = json_decode($json);

        $email = $data->email;
        $pass = $data->pass;

        $user = new User(null, $email, $pass);
        $userService = new UserService();
        $userDAO = new UserDAO();

        $validate = $userService->validadeUser($user);

        if ($validate != '') {
            
            ob_clean();
            echo json_encode(
                array(
                    'success' => 0,
                    'msg' => $validate,
                )
            );

            exit;

        } else {

            $verifyEmail = $userDAO->findUserByEmail($user);

            if ($verifyEmail == 0 ) {
                
                $userDAO->createUser($user);

                ob_clean();
                header_remove(); 
                echo json_encode(array(
                    'success' => '1',
                    'msg' => 'Cadastro realizado com sucesso'
                ));

                exit;

            } else {

                ob_clean();
                header_remove(); 
                echo json_encode(array(
                    'success' => '0',
                    'msg' => 'Cadastro já existe!'
                ));

                exit;
            }
        }
    }


    public static function loginto():void
    {

        $json = file_get_contents('php://input');
        $data = json_decode($json);

        $email = $data->email;
        $pass = $data->pass;

        $user = new User(null, $email, $pass);
        $userDAO = new UserDAO();

        $idUser = $userDAO->findUser($user);

        if ($idUser != 0) {
            
            $_SESSION['released'] = true;
            $_SESSION['id_user'] = $idUser;
            
            ob_clean();
            header_remove(); 
            echo json_encode(array(
                'success' => '1',
            ));

            exit;

        } else {

            ob_clean();
            header_remove(); 
            echo json_encode(array(
                'success' => '0',
                'msg' => 'Email ou Senha invalidos'
            ));

            exit;
        }
    }


    public static function logout():void
    {
        session_destroy();
        header('Location: /login');
    }

}