<?php
require_once 'Person.php';

class Student extends Person
{
    public function __construct($name)
    {
        parent::__construct($name);
    }

    public function greetings()
    {
        return "Hello everybody, I'm " . $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }

}