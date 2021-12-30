<?php

require_once 'classes/Programmer.php';
require_once 'classes/Student.php';
require_once 'classes/Teacher.php';


$prog = new Programmer('Name_Prog');
echo $prog->greetings();

echo '<br>';

$stud = new Student('Name_Std');
echo $stud->greetings();

echo '<br>';

$teacher = new Teacher('Name_Teacher');
echo $teacher->greetings();