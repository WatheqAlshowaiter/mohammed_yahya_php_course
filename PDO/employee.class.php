<?php

class Employee
{
    private $id;
    private $name;
    private $age;
    private $address;
    private $tax;
    private $salary;


    public function __construct($name, $age, $address, $tax, $salary)
    {
        $this->age = $age;
        $this->name = $name;
        $this->salary = $salary;
        $this->tax = $tax;
        $this->address = $address;
    }

    public function __get($prop)
    {
        return $this->$prop;
    }

    public function calculateSalary()
    {
        return $this->salary - ($this->salary * $this->tax / 100);
    }
}
