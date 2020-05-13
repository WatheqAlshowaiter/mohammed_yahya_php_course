<style type="text/css">
    * {
        margin: 0;
        padding: 0;
        border: 0;
        outline: none;
        line-height: 1.2;
        font-size: 1em;
    }

    div.wrapper {
        overflow: hidden;
    }

    div.wrapper div.emp-form {
        /* float: left; */
        width: 400px;
        margin: 0 auto;
    }

    div.wrapper div.employees {
        margin: 0 auto;
        width: 780px;
    }

    form.app-form {
        width: 400px;
        margin: 20px 50px 0 20px;
    }

    form.app-form fieldset {
        padding: 10px;
        background: #f1f1f1;
        border: solid 1px #e4e4e4;
    }

    form.app-form fieldset legend {
        background: #e4e4e4;
        padding: 5px;
        font: 1em Arial, Helvetica, sans-serif;
        color: #666;
    }

    form.app-form fieldset p.message {
        background: green;
        color: #FFF;
        padding: 3px;
        margin: 3px 0;
        border-radius: 3px;
        font: 0.85em Arial, Helvetica, sans-serif;
    }

    form.app-form fieldset p.message.error {
        background: #900;
    }

    form.app-form label {
        font-family: Arial, Helvetica, sans-serif;
        font-size: 0.85em;
        color: #666666;
    }

    form.app-form table {
        width: 100%;
    }

    form.app-form table tr td input[type=text],
    form.app-form table tr td input[type=number] {
        width: 96%;
        padding: 2%;
        font-family: Arial, Helvetica, sans-serif;
        font-size: 0.85em;
    }

    form.app-form table tr td input[type=submit] {
        padding: 8px;
        border-radius: 3px;
        background: green;
        color: #FFF;
        font-family: Arial, Helvetica, sans-serif;
        font-size: 0.85em;
        cursor: pointer;
    }

    form.app-form table tr td {
        padding: 3px 0;
    }

    div.wrapper div.employees table {
        width: 780px;
        margin: 20px 20px 0 0;
        border-collapse: collapse;
    }

    div.wrapper div.employees table thead th {
        text-align: left;
        padding: 5px;
        border-right: solid 2px #e4e4e4;
        border-bottom: solid 2px #e3e3e3;
        font: bold 0.9em Arial, Helvetica, sans-serif;
        color: #666;
    }

    div.wrapper div.employees table thead th:last-of-type {
        border-right: none;
    }

    div.wrapper div.employees table tbody td {
        text-align: left;
        padding: 5px;
        border-bottom: 1px solid #e4e4e4;
        font: 0.8em Arial, Helvetica, sans-serif;
        color: #666;
    }

    div.wrapper div.employees table tbody tr:nth-child(2n) td {
        background: #f1f1f1;
    }

    div.wrapper div.employees table tbody td a:link,
    div.wrapper div.employees table tbody td a:visited {
        color: green;
    }
</style>
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
                            <input required type="text" name="name" id="name" placeholder="write the employee name" maxlength="50" value="<?= $employee->name;?>">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="age">Employee Age: </label>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <input required type="number" name="age" id="age" min="22" max="60" value="<?= $employee->age;?>">
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label for="address">Employee Address: </label>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <input required type="text" name="address" id="address" placeholder="write the employee address" maxlength="100" value="<?= $employee->address;?>">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="salary">Employee Salary: </label>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <input required type="number" name="salary" id="salary" step="0.01" min="1500" max="9000" value="<?= $employee->salary;?>">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="tax">Employee Tax (%): </label>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <input required type="number" name="tax" id="tax" step="0.01" min="1" max="5" value="<?= $employee->tax;?>">
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
</div>