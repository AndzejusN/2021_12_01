<?php
require_once 'User.php';

class Student extends User
{
    protected $money;
    protected $course;

    public function __construct($name, $age, $money = NULL, $course= NULL)
    {
        parent::__construct($name, $age);
        $this->setMoney($money);
        $this->setCourse($course);
    }

    /**
     * @return mixed
     */
    public function getCourse($course)
    {
        return $this->course;
    }

    /**
     * @return mixed
     */
    public function getMoney($money)
    {
        return $this->money;
    }

    /**
     * @param mixed $course
     */
    public function setCourse($course): void
    {
        $this->course = $course;
    }

    /**
     * @param mixed $money
     */
    public function setMoney($money): void
    {
        $this->money = $money;
    }
}