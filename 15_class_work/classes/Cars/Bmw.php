<?php
require '../Car.php';

class Bmw extends Car
{
 function __construct($model = NULL, $year = NULL)
 {
     parent::__construct('BMW',$model, $year);
 }
}