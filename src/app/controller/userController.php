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
        
        // Renderiza para pagina '/login'.
        require __DIR__ . '../../../public/view/body/login.php';
    }


    public static function saveUser():void
    {

        // Armazena dados recebidos em formato JSON.
        $json = file_get_contents('php://input');
        // Transforma JSON em Array.
        $data = json_decode($json);

        $email = $data->email;
        $pass = $data->pass;

        $user = new User(null, $email, $pass);
        $userService = new UserService();
        $userDAO = new UserDAO();

        $validate = $userService->validadeUser($user);

        if ($validate != '') {
            
            // Apaga o Body.
            ob_clean();
            // Remove o header.
            header_remove(); 
            // Retorna Objeto JSON.
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

                // Apaga o Body.
                ob_clean();
                // Remove o header.
                header_remove(); 
                // Retorna Objeto JSON.
                echo json_encode(array(
                    'success' => '1',
                    'msg' => 'Cadastro realizado com sucesso'
                ));

                exit;

            } else {

                // Apaga o Body.
                ob_clean();
                // Remove o header.
                header_remove(); 
                // Retorna Objeto JSON.
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

        // Armazena dados recebidos em formato JSON.
        $json = file_get_contents('php://input');
        // Transforma JSON em Array.
        $data = json_decode($json);

        $email = $data->email;
        $pass = $data->pass;

        $user = new User(null, $email, $pass);
        $userDAO = new UserDAO();

        $idUser = $userDAO->findUser($user);

        if ($idUser != 0) {
            
            $_SESSION['released'] = true;
            $_SESSION['id_user'] = $idUser;
            
            // Apaga o Body.
            ob_clean();
            // Remove o header.
            header_remove(); 
            // Retorna Objeto JSON.
            echo json_encode(array(
                'success' => '1',
            ));

            exit;

        } else {

            // Apaga o Body.
            ob_clean();
            // Remove o header.
            header_remove(); 
            // Retorna Objeto JSON.
            echo json_encode(array(
                'success' => '0',
                'msg' => 'Email ou Senha invalidos'
            ));

            exit;
        }
    }


    public static function logout():void
    {

        // Destroi Sessão.
        session_destroy();
        // Renderiza para pagina '/login'.
        header('Location: /login');
    }

}