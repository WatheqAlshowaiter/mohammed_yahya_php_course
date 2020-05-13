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
        float: left;
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
    <?php
    if (isset($_SESSION['message'])) : ?>
        <p class="message"><?= $_SESSION['message']; ?><?= isset($error) ? ' error' : ''; ?></p>
        <?php unset($_SESSION['message']); ?>
    <?php endif; ?>
    <a href="/employee/add">Add New Employee</a>
    <div class="employees">
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Age</th>
                    <th>Address</th>
                    <th>Tax (%)</th>
                    <th>Control</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (false !== $employees) : ?>
                    <?php foreach ($employees as $employee) : ?>
                        <tr>
                            <td><?= $employee->name; ?></td>
                            <td><?= $employee->age; ?></td>
                            <td><?= $employee->address; ?></td>
                            <td><?= $employee->tax; ?></td>
                            <td>
                                <a href="employee/edit/<?= $employee->id; ?>">edit</a>
                                <a href="employee/delete/<?= $employee->id; ?>" onclick="if(!confirm('هل تود حذف هذا المستخدم؟')) return false;">delete</a>
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