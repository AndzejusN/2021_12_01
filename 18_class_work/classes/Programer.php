<?php
require_once 'Person.php';

class Programer extends Person
{

    public function __construct($name){
        parent::__construct($name);
    }

    public function greetings(){
        echo 'Hello world';
    }
}