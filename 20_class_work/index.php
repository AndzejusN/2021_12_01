<?php

require 'vendor/autoload.php';

use App\Classes\Driver;
use App\Classes\Worker;
use App\Classes\Pilot;

$worker = new Worker('Pranas', 45);
$worker->setSalary(200);

var_dump($worker);

echo '<br>';

$driver = new Driver('Andrius',50,1200,15, 'B,C,D,E');

var_dump($driver);

echo '<br>';

$pilot = new Pilot('Frank',35);
$pilot->setSalary(400);

var_dump($pilot , $pilot->countSalary());

