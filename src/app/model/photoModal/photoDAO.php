<?php

namespace Projeto\GaleriaDeFotos\App\Modal\photoModal;

use Projeto\GaleriaDeFotos\App\Config\Connect;

class PhotoDAO
{

    private $con;

    public function __construct()
    {
        $this->conn = Connect::createConnection();
    }

}