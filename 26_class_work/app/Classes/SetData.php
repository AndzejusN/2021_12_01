<?php

namespace App\Classes;

use App\Classes\Helper as dataReach;
use Exception;

class SetData
{
    public function setOrderId(): string
    {
        return uniqid();
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

    public function deleteOrderById($orderId)
    {
        $path = dataReach::getOrdersPath();
        $orders = dataReach::getDataOrders();

        if (array_key_exists($orderId, $orders)) {
            unset($orders[$orderId]);
            $orders = json_encode($orders);
            file_put_contents($path, $orders);
            return $orders;
        }
        throw new Exception('Such order ID not found, please check. (No data was erased)');
    }

    public function setUserWithId(&$data)
    {
        $path = dataReach::getUsersPath();
        $dataUsers = dataReach::getDataUsers();
        $userId = uniqid();
        $some['id'] = $userId;
        $some = array_merge($some, $data);
        $newKeyData[$userId] = $some;
        $response = array_merge($dataUsers, $newKeyData);
        $response = json_encode($response, JSON_PRETTY_PRINT);
        file_put_contents($path, $response);

        return $some;
    }

}