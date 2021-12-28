<?php

class Vehicle{

    public $make;
    public $model;
    public $year;

    public function __construct($make = NULL, $model = NULL, $year = NULL){
        $this->make = $make;
        $this->model = $model;
        $this->year = $year;
    }

    public function setWheelsNumber($wheels) {
        $this->wheels = $wheels;
}

    public function getIntroduction() {
        return "$this->make $this->model";
	}

    public function getAge() {
		return date("Y") -  $this->year;
	}

    public function getAgeText() {
		if ($this->getAge() <= 10) {
            return '10 years or newer';
        } else {
            return '11 years or older';
        }
	}

    public function getWheelsNumber() {
		return count($this->wheels) || 0;
	}

    public function getWheelsNumberText() {
		return __CLASS__ . 'has' .  $this->getWheelsNumber() . 'wheels';
	}

    /**
     * @throws Exception
     */
    public function getFuelType() {
     throw new Exception('Fuel type not found');
	}
}