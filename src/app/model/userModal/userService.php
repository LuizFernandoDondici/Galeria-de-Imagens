<?php

namespace Projeto\GaleriaDeFotos\App\Model\UserModal;

class UserService
{

    public function __construct()
    {
    }

    
    public function validadeUser(User $user):string
    {
        
        if (strlen($user->getEmail()) > 50) {
            return 'O e-mail deve ter no maximo 50 caracteres';
        }

        if (preg_match('/\s/', $user->getEmail())) {
            return 'O e-mail nao deve conter espaços';
        }

        if (!preg_match('/^[a-z0-9._-]+@[a-z0-9]+\.[a-z]+(\.[a-z]+)?$/i', $user->getEmail())) {
            return 'E-mail invalido ';
        }

        if (strlen($user->getPass()) < 4 || strlen($user->getPass()) > 8) {
            return 'A senha deve ter entre 4 e 8 caracteres';
        }

        if (preg_match('/\s/', $user->getPass())) {
            return 'A senha nao deve conter espaços';
        }

        return '';

    }

}