<?php

session_start();

// to know loaded extentions
// pre(get_loaded_extensions());

error_reporting(E_ALL); // for development to know all problems in my code

require_once 'db.php';
require_once 'employee.class.php';



if (isset($_POST['submit'])) {

    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    $address = filter_input(INPUT_POST, 'address', FILTER_SANITIZE_STRING);
    $age =  filter_input(INPUT_POST, 'age', FILTER_SANITIZE_NUMBER_INT);
    $salary =  filter_input(INPUT_POST, 'salary', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
    $tax =  filter_input(INPUT_POST, 'tax', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);

    $params = [':name' => $name, ':address' => $address, ':salary' => $salary, ':tax' => $tax, ':age' => $age];

    if (isset($_GET['action']) and $_GET['action'] == 'edit' and isset($_GET['id'])) {
        $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
        $sql = 'UPDATE employees SET name = :name, address = :address, salary = :salary, tax = :tax, age = :age WHERE id = :id';
        $params[':id'] = $id;
    } else {
        $sql = 'INSERT INTO employees SET name = :name, address = :address, salary = :salary, tax = :tax, age = :age';
    }
    // Inserting or updating employees

    $stmt = $connection->prepare($sql);


    if ($stmt->execute($params)) {
        $_SESSION['message'] = 'Employee <b><i>'  . $name . '</i></b> saved successfully';
        header("Location: index.php");
        session_write_close();
        exit;
    } else {
        $error = false;
        $_SESSION['message'] = 'Error of saving employee ';
    }
}
// Update
if (isset($_GET['action']) and $_GET['action'] == 'edit' and isset($_GET['id'])) {
    // echo "you try to edit and employee"; // to make sure
    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
    if ($id > 0) {
        $sql = 'SELECT * from employees WHERE id = :id';
        $result = $connection->prepare($sql);
        $foundUser = $result->execute([':id' => $id]);
        if ($foundUser === true) {
            $user = $result->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Employee', array('name', 'age', 'address', 'tax', 'salary'));
            $user = array_shift($user);
        }
    }
}

// Update
if (isset($_GET['action']) and $_GET['action'] == 'delete' and isset($_GET['id'])) {
    // echo "you try to edit and employee"; // to make sure
    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
    if ($id > 0) {
        $sql = 'DELETE FROM employees WHERE id = :id';
        $result = $connection->prepare($sql);
        $foundUser = $result->execute([':id' => $id]);
        if ($foundUser === true) {
            $_SESSION['message'] = 'Employee has been deleted successfully';
            header("Location: index.php");
            session_write_close();
            exit;
        }
    }
}

// Reading from database back
$sql = "SELECT * from employees";
$stmt = $connection->query($sql);
$result = $stmt->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Employee', array('name', 'age', 'address', 'tax', 'salary'));
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
    <link rel="stylesheet" href="font-awesome.min.css">
</head>

<body>
    <div class="wrapper">
        <div class="emp-form">
            <form class="app-form" action="" method="post" enctype="application/x-www-form-urlencoded" autocomplete="off">

                <fieldset>
                    <legend>Employee Information </legend>
                    <?php
                    if (isset($_SESSION['message'])) : ?>
                        <p class="message"><?= $_SESSION['message']; ?><?= isset($error) ? ' error' : ''; ?></p>
                        <?php unset($_SESSION['message']); ?>
                    <?php endif; ?>

                    <table>
                        <tr>
                            <td>
                                <label for="name">Employee Name: </label>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <input required type="text" name="name" id="name" placeholder="write the employee name" maxlength="50" value="<?= $user->name ?? ''; ?>">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="age">Employee Age: </label>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <input required type="number" name="age" id="age" min="22" max="60" value="<?= $user->age ?? ''; ?>">
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label for="address">Employee Address: </label>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <input required type="text" name="address" id="address" placeholder="write the employee address" maxlength="100" value="<?= $user->address ?? ''; ?>">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="salary">Employee Salary: </label>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <input required type="number" name="salary" id="salary" step="0.01" min="1500" max="9000" value="<?= $user->salary ?? ''; ?>">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="tax">Employee Tax (%): </label>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <input required type="number" name="tax" id="tax" step="0.01" min="1" max="5" value="<?= $user->tax ?? ''; ?>">
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
                        <th>Control</th>
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
                                <td>
                                    <a href="index.php?action=edit&id=<?= $employee->id; ?>"><i class="fa fa-edit"></i></a>
                                    <a href="index.php?action=delete&id=<?= $employee->id; ?>" onclick="if(!confirm('هل تود حذف هذا المستخدم؟')) return false;"><i class="fa fa-times"></i></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <td colspan="2">
                            <p>Sorry. no employees yet.</p>
                        </td>
                    <?php endif; ?>

                </tbody>
            </table>
        </div>
    </div>

</body>

</html>