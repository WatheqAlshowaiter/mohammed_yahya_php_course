<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Salaries</title>
    <style>
        * {
            margin: 0;
            padding: 0;
        }

        body {
            padding: 10px;
        }

        table {
            width: 600px;
            border-collapse: collapse;
        }

        table tr td,
        table tr th {
            border: solid 1px #999;
            padding: 5px;
            text-align: left;
        }

        table tr th {
            background: #666;
            color: #fff;
        }

        table tr:nth-child(2n) {
            background: #e4e4e4;
        }

        table tr:hover {
            background: #dedb7673;
        }
        table tr th[data-footer]{
            background: #0a0303;
        }
    </style>
</head>

<body>
    <!-- <table>
        <tr>
            <th>Employee Name</th>
            <th>Salary</th>
        </tr>
        <tr>
            <td>Mohammed</td>
            <td>10000</td>
        </tr>
        <tr>
            <td>Ali</td>
            <td>20000</td>
        </tr>
    </table> -->

    <?php
    $employees = ['ali', 'ahmed', 'saeed', 'khaled'];
    $salaries = [1000, 2200, 3200, 2500];

    echo '<table>';
    echo "<tr>  
        <th>Employee Name</th>
        <th>Salary</th>
        </tr>";
    for ($i = 0, $ii = count($salaries); $i < $ii; $i++) {

        echo '<tr>';
        echo "<td>{$employees[$i]}</td>";
        echo "<td>{$salaries[$i]}</td>";
        echo '</tr>';
    }
    echo "<tr> <th colspan='2' data-footer='footer'>footer</th></tr>";
    echo '</table>';

    ?>

</body>

</html>
<?php
