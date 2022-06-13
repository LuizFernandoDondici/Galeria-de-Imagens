<?php

namespace Projeto\GaleriaDeFotos\App\Config;

use PDO;

class Connect
{

    public static function createConnection()
    {
        try {
            
            $pdo = new PDO('sqlite:' . __DIR__ . '../../database/galeria-fotos.sqlite');

            $queryGaleria = 
                'CREATE TABLE IF NOT EXISTS galeria(
                    id_img INTEGER PRIMARY KEY,
                    path_img TEXT,
                    name_img TEXT
                );';

            $queryLogin = 
                'CREATE TABLE IF NOT EXISTS login(
                    id_login INTEGER PRIMARY KEY,
                    email_login TEXT,
                    pass_login TEXT
                );';
            
            $pdo->exec($queryGaleria);
            $pdo->exec($queryLogin);

            return $pdo;

        } catch (\Throwable $th) {
            echo 'erro conexão';
        }
    }

}