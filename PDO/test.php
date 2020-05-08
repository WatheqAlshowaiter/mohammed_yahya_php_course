<?php

require_once 'db.php';
require_once 'abstractModel.class.php';
require_once 'employee.class.php';

// $emp = new Employee('Mohammed Yahya', 21, 'Cairo', 1.03, 5000);
echo "<pre>";
print_r(Employee::getByPK(42));

$emps = Employee::get(
    'SELECT * FROM employees WHERE age  = :age',
    ['age' => [Employee::DATA_TYPE_INT, 30]]
);

var_dump($emps);
// $mohammed = Employee::getByPK(42);
// $mohammed->setName( 'Mohammed Yahia after save');
// var_dump($mohammed->save()); 
