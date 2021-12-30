<?php

require_once 'classes/Programer.php';
require_once 'classes/Student.php';
require_once 'classes/Teacher.php';


$prog = new Programer('Name_Prog');
var_dump($prog->greetings());
echo '<br>';
$stud = new Student('Name_Std');
var_dump($stud->greetings());
echo '<br>';
$teacher = new Teacher('Name_Teacher');
var_dump($teacher->greetings());