<?php

namespace Projeto\GaleriaDeFotos\App\Model\UserModal;

class UserService
{

    public function __construct()
    {
    }

    
    public function validadeUser(User $user):string
    {

        if (empty($user->getEmail())) {
            return "Preencha o campo e-mail";
        }

        if (strlen($user->getEmail()) > 50) {
            return 'O e-mail deve ter no maximo 50 caracteres';
        }

        if (preg_match('/\s/', $user->getEmail())) {
            return 'O e-mail nao deve conter espaços';
        }

        if (empty($user->getPass())) {
            return "Preencha o campo senha";
        }

        if (!preg_match('/^[a-z0-9._-]+@[a-z0-9]+\.[a-z]+(\.[a-z]+)?$/i', $user->getEmail())) {
            return 'E-mail invalido ';
        }

        if (strlen($user->getPass()) != 4) {
            return 'A senha deve ter 4 digitoss';
        }

        if (preg_match('/\s/', $user->getPass())) {
            return 'A senha nao deve conter espaços';
        }

        return '';

    }

}