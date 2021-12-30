<?php

require_once 'User.php';

class Worker extends User
{
    private $salary;
    public function __construct($name, $age, $salary){
        parent::__construct($name, $age);
        $this->salary = $salary;
    }

    /**
     * @return mixed
     */
    public function getSalary()
    {
        return $this->salary;
    }

    /**
     * @param mixed $salary
     */
    public function setSalary($salary): void
    {
        $this->salary = $salary;
    }

}