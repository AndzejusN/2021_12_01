<?php

abstract class Person
{

    protected $name;

    public function __construct($name)
    {
        $this->setName($name);

    }

    protected abstract function greetings();

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }
}