<?php

require 'Vehicle.php';

class Bus extends Vehicle
{
    public $wheels = 0;

    function __construct($make = NULL, $model = NULL, $year = NULL, $wheels = NULL)
    {
        parent::__construct($make, $model, $year);
        $this->wheels = $wheels;
    }

    public function getFuelType()
    {
        return [2, 3];
    }
}