<?php

require_once 'classes/Student.php';
require_once 'classes/Driver.php';

$student = new Student('Stud_Name', 50,50,3);
var_dump($student);

echo '<br';

$driver = new Driver('Driver_Name',50,2000,25,'B,C,D,E');
var_dump($driver);