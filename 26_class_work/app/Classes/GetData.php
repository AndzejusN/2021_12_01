<?php

namespace App\Classes;

use Exception;
use App\Classes\StaticFunctions as dataReach;

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
}

