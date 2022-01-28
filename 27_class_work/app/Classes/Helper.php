<?php

namespace App\Classes;

use PDO;


class Helper
{
    public static function fileAccessibility()
    {

        $fileData = @file_get_contents(ROOT_PATH . '/data/data.json');

        if ($fileData === FALSE) {
            $fileData [] = 'File not accessible';
        } else {
            $fileData = file_get_contents(ROOT_PATH . '/data/data.json');
        }
        $typeData = gettype($fileData);

        if ($typeData !== "array") {
            $fileData = json_decode($fileData, true);
        }
        return $fileData;
    }

    public static function databaseConnection()
    {
        $database = getenv('MYSQL_DATABASE');
        $username = getenv('MYSQL_USER');
        $password = getenv('MYSQL_PASSWORD');
        return new PDO("mysql:host=db-mariadb;dbname={$database}", $username, $password, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]);

    }
}