<?php

require('Vehicle.php');

Class Plane extends Vehicle {
    public $wheels = 2;

    function __construct($make = NULL, $model = NULL, $year = NULL, $wheels = NULL){
        parent::__construct($make, $model, $year);
        $this->wheels = $wheels;
    }

public function getFuelType() {
		return [5];
	}
}
