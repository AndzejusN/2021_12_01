<?php

require_once 'User.php';

class Worker extends User
{
    protected $salary;

    public function __construct($name, $age, $salary = NULL){
        parent::__construct($name, $age);
        $this->setSalary($salary);
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