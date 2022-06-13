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


}