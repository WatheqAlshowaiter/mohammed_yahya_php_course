<?php
require_once 'abstractModel.class.php';

class Employee extends AbstractModel
{
    public $id;
    public $name;
    public $age;
    public $address;
    public $tax;
    public $salary;

    public static $db;

    protected static $tableName = "employees";
    protected static $tableSchema =
    [
        'name'      => self::DATA_TYPE_SRT,
        'age'       => self::DATA_TYPE_INT,
        'tax'       => self::DATA_TYPE_DECIMAL,
        'address'   => self::DATA_TYPE_SRT,
        'salary'    => self::DATA_TYPE_DECIMAL
    ];
    protected static $primaryKey = 'id';

    public function __construct($name, $age, $address, $tax, $salary)
    {
        global $connection;

        $this->age = $age;
        $this->name = $name;
        $this->salary = $salary;
        $this->tax = $tax;
        $this->address = $address;

        self::$db = $connection;
    }

    public function __get($prop)
    {
        return $this->$prop;
    }

    public function setName($name)
    {
        $this->name = $name;
    }
    public function calculateSalary()
    {
        return $this->salary - ($this->salary * $this->tax / 100);
    }

    public function fireEmployee()
    {
    }
    public function promoteEmployee()
    {
    }
    public function getTableName()
    {
        return self::$tableName;
    }
}
