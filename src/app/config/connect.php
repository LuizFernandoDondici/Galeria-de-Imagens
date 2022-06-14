<?php

namespace Projeto\GaleriaDeFotos\App\Config;

use PDO;

class Connect
{

    public static function createConnection()
    {
        try {
            
            $pdo = new PDO('sqlite:' . __DIR__ . '../../database/galeria-fotos.sqlite');

            $queryPhoto = 
                'CREATE TABLE IF NOT EXISTS photo(
                    id_photo INTEGER PRIMARY KEY,
                    path_photo TEXT,
                    name_photo TEXT,
                    id_user INTEGER,
                    FOREIGN KEY (id_user) REFERENCES login (id_user)
                );';

            $queryUser = 
                'CREATE TABLE IF NOT EXISTS user(
                    id_user INTEGER PRIMARY KEY,
                    email_user TEXT,
                    pass_user TEXT
                );';
            
            $pdo->exec($queryPhoto);
            $pdo->exec($queryUser);

            return $pdo;

        } catch (\Throwable $th) {
            echo 'erro conexão';
        }
    }

}