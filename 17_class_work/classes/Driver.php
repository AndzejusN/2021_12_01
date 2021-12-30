<?php
require_once 'Worker.php';

class Driver extends Worker
{
    public $expYears;
    public $drvLicence;

    public function __construct($name, $age, $salary, $expYears = NULL, $drvLicence = NULL){
        parent::__construct($name, $age, $salary);
        $this->expYears = $expYears;
        $this->drvLicence = $drvLicence;
    }

    /**
     * @return mixed
     */
    public function getDrvLicence()
    {
        return $this->drvLicence;
    }

    /**
     * @return mixed
     */
    public function getExpYears()
    {
        return $this->expYears;
    }

    /**
     * @param mixed $drvLicence
     */
    public function setDrvLicence($drvLicence): void
    {
        $this->drvLicence = $drvLicence;
    }

    /**
     * @param mixed $expYears
     */
    public function setExpYears($expYears): void
    {
        $this->expYears = $expYears;
    }
}