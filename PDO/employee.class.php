<?php

class Employee
{
    public $id;
    public $name;
    public $age;
    public $address;
    public $tax;
    public $salary;

    // public function __construct($name, $age, $tax, $salary)
    // {
    //     $this->age = $age;
    //     $this->name = $name;
    //     $this->salary = $salary;
    //     $this->tax = $tax;
    // }

    public function calculateSalary()
    {
        return $this->salary - ($this->salary * $this->tax / 100);
    }
}
