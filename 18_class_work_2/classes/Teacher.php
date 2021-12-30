<?php

require_once 'Person.php';

class Teacher extends Person
{
    public function greetings()
    {
        return "Hello students, I'm " . $this->getName();
    }
}