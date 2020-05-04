<?php

// to know loaded extentions
// pre(get_loaded_extensions());


require_once 'db.php';
require_once 'employee.class.php';

if (isset($_POST['submit'])) {

    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    $address = filter_input(INPUT_POST, 'address', FILTER_SANITIZE_STRING);
    $age =  filter_input(INPUT_POST, 'age', FILTER_SANITIZE_NUMBER_INT);
    $salary =  filter_input(INPUT_POST, 'salary', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
    $tax =  filter_input(INPUT_POST, 'tax', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);

    // $employee = new Employee($name, $age, $tax, $salary);
    $employee = new Employee;
    $employee->name = $name;
    $employee->age = $age;
    $employee->salary = $salary;
    $employee->tax = $tax;
    $employee->address = $address;

    // Inserting or updating employees
    $sql = 'INSERT INTO employees SET name ="' . $name . '"
     , address = "' . $address . '"
    , salary = ' . $salary . ' , tax= ' . $tax . ', age=' . $age . '';

    if ($connection->exec($sql)) {
        $message = 'Employee <b><i>'  . $name . '</i></b> inserted successfully';
    } else {
        $error = false;
        $message = 'Error of inserting name';
    }
}
// Reading from database back
$sql = "SELECT * from employees";
$stmt = $connection->query($sql);
$result = $stmt->fetchAll(PDO::FETCH_CLASS, 'Employee');
$result = (is_array($result) and !empty($result)) ? $result : false;

// Helper Functions of pre
function pre($var)
{

    if (is_array($var)) {
        echo "<pre>";
        print_r($var);
        echo "</pre>";
    } else {
        echo "<pre>";
        var_dump($var);
        echo "</pre>";
    }
}

function pred($var)
{
    pre($var);
    die;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDO</title>
    <link rel="stylesheet" href="main.css">
</head>

<body>
    <div class="wrapper">
        <div class="emp-form">
            <form class="app-form" action="" method="post" enctype="application/x-www-form-urlencoded">

                <fieldset>
                    <legend>Employee Information </legend>
                    <?php
                    if (isset($message)) : ?>
                        <p class="message"><?= $message; ?><?= isset($error) ? ' error' : ''; ?></p>
                    <? endif; ?>



                    <table>
                        <tr>
                            <td>
                                <label for="name">Employee Name: </label>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <input required type="text" name="name" id="name" placeholder="write the employee name" maxlength="50">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="age">Employee Age: </label>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <input required type="number" name="age" id="age" min="22" max="60">
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label for="address">Employee Address: </label>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <input required type="text" name="address" id="address" placeholder="write the employee address" maxlength="100">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="salary">Employee Salary: </label>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <input required type="number" name="salary" id="salary" step="0.01" min="1500" max="9000">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="tax">Employee Tax (%): </label>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <input required type="number" name="tax" id="tax" step="0.01" min="1" max="5">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="submit" name="submit" value="Save">
                            </td>
                        </tr>
                    </table>
                </fieldset>
            </form>
        </div>
        <div class="employees">
            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Age</th>
                        <th>Address</th>
                        <th>Actual Salary</th>
                        <th>Tax (%)</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (false !== $result) : ?>
                        <?php foreach ($result as $employee) : ?>
                            <tr>
                                <td><?= $employee->name; ?></td>
                                <td><?= $employee->age; ?></td>
                                <td><?= $employee->address; ?></td>
                                <td><?= $employee->calculateSalary(); ?> L.E</td>
                                <td><?= $employee->tax; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <td colspan="2"><p>Sorry. no employees yet.</p></td>
                    <?php endif; ?>

                </tbody>
            </table>
        </div>
    </div>

</body>

</html>