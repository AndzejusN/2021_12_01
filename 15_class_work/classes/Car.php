<?php

require_once 'Vehicle.php';

class Car extends Vehicle
{
    public $wheels = 4;

    function __construct($make = NULL, $model = NULL, $year = NULL, $wheels = NULL)
    {
        parent::__construct($make, $model, $year);
        $this->wheels = $wheels;
    }


    public function getFuelType()
    {
        return [1, 2];
    }
}