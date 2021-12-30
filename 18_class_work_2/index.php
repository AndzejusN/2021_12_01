<?php

require_once 'classes/Programmer.php';
require_once 'classes/Student.php';
require_once 'classes/Teacher.php';


$prog = new Programmer;
$prog->setName('Prog_Name');
echo $prog->greetings();

echo '<br>';

$stud = new Student;
$stud->setName('Stud_Name');
echo $stud->greetings();

echo '<br>';

$teacher = new Teacher;
$teacher->setName('Teachers_Name');
echo $teacher->greetings();