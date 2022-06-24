<?php

namespace Projeto\GaleriaDeFotos\App\Model\UserModal;

class UserService
{

    public function __construct()
    {
    }

    
    public function validadeUser(User $user):string
    {

        // Verifica se existe 'e-mail'.
        if (empty($user->getEmail())) {
            return "Preencha o campo e-mail";
        }

        // Verifica tamanho do 'e-mail'.
        if (strlen($user->getEmail()) > 50) {
            return 'O e-mail deve ter no maximo 50 caracteres';
        }

        // Verifica se o 'e-mail' contem espaços.
        if (preg_match('/\s/', $user->getEmail())) {
            return 'O e-mail nao deve conter espaços';
        }

        // Verifica formato do 'e-mail'.
        if (!preg_match('/^[a-z0-9._-]+@[a-z0-9]+\.[a-z]+(\.[a-z]+)?$/i', $user->getEmail())) {
            return 'E-mail invalido ';
        }

        // Verifica se existe 'senha'.
        if (empty($user->getPass())) {
            return "Preencha o campo senha";
        }

        // Verifica tamanho da 'senha'.
        if (strlen($user->getPass()) != 4) {
            return 'A senha deve ter 4 digitoss';
        }

        // Verifica se a 'senha' contem espaços.
        if (preg_match('/\s/', $user->getPass())) {
            return 'A senha nao deve conter espaços';
        }

        return '';
    }

}