<?php

namespace App\Classes;

class StaticFunctions
{
    public static function getDataOrders()
    {
        $path = self::getOrdersPath();
        $orders = file_get_contents($path);
        $orders = json_decode($orders, true);
        if ($orders == NULL){
            return [];
        }
        return $orders;
    }

    public static function getDataUsers(): array
    {
        $path = self::getUsersPath();
        $users = file_get_contents($path);
        $users = json_decode($users, true);
        if ($users == NULL){
            return [];
        }
        return $users;
    }

    public static function getOrdersPath():string{
        return ROOT_PATH . $_ENV['DATA_PATH'];
    }

    public static function getUsersPath(){
        return ROOT_PATH . $_ENV['USER_PATH'];
    }

}