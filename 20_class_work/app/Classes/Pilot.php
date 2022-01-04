<?php

namespace App\Classes;

use App\Classes\Worker;

class Pilot extends Worker {

    public function __construct($name, $age, $salary = NULL){
        parent::__construct($name, $age, $salary);
    }

    public function countSalary()
    {
        return $this->getSalary() * 5;
    }
}