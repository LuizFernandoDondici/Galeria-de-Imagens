<?php

namespace Projeto\GaleriaDeFotos\App\Config;

use PDO;

class Connect
{

    public static function createConnection()
    {
        try {
            
            $pdo = new PDO('sqlite:' . __DIR__ . '../../database/galeria-fotos.sqlite');

            $query = 
                'CREATE TABLE IF NOT EXISTS galeria(
                    id_img INTEGER PRIMARY KEY,
                    path_img TEXT,
                    name_img TEXT
            );';
            
            $pdo->exec($query);

            return $pdo;

        } catch (\Throwable $th) {
            echo 'erro conexão';
        }
    }

}