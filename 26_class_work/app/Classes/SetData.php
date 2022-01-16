<?php

namespace App\Classes;

use App\Classes\StaticFunctions as dataReach;

class SetData
{
    public function setOrderId()
    {
        $path = ROOT_PATH . $_ENV['ORDER_PATH'];
        $orderId = file_get_contents($path);
        $orderId += 1;
        file_put_contents($path, $orderId);
        return $orderId;
    }

    public function setOrderById($orderId, &$data): array
    {
        $path = dataReach::getOrdersPath();
        $orders = dataReach::getDataOrders();

        $some['id'] = $orderId;
        $some = array_merge($some, $data);
        $newKeyData[$orderId] = $some;
        $response = array_merge($orders, $newKeyData);
        $response = json_encode($response, JSON_PRETTY_PRINT);
        file_put_contents($path, $response);

        return $some;
    }
}