<?php

namespace App\Classes;

use Exception;
use App\Classes\Helper as dataReach;

class GetData
{
    public function getOrderById(string $id): array
    {
        $orders = dataReach::getDataOrders();

        if (array_key_exists($id, $orders)) {
            return $orders[$id];
        }
        throw new Exception('No order ID found, please try again');
    }
    public function getUserById(string $id): array
    {
        $users = dataReach::getDataUsers();

        if (array_key_exists($id, $users)) {
            return $users[$id];
        }
        throw new Exception("No user information found by mentioned: " . $id . " ID number");
    }
}

