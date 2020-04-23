<?php

$arr = range(1, 10);
$new_arr = array_chunk($arr, 4, true);

echo "<pre>";
// print_r($new_arr);
echo "</pre>";


function odd($var)
{
    // returns whether the input integer is odd
    return $var & 1;
}

function even($var)
{
    // returns whether the input integer is even
    return !($var & 1);
}

$array1 = ['a' => 1, 'b' => 2, 'c' => 3, 'd' => 4, 'e' => 5];
$array2 = [6, 7, 8, 9, 10, 11, 12];

echo "Odd :\n";
pre(array_filter($array1, "odd"));
echo "Even:\n";
pre(array_filter($array2, "even"));


$students = ['ali', 'ahmed', 'adnan', 'saeed', 'khaled'];

$randomKeys = array_rand($students, 4);

$randomeStudents = [];

foreach ($randomKeys as $key) {
    array_push($randomeStudents, $students[$key]);
}

echo "students";
pre($students);


echo "randome students: ";
pre($randomeStudents);


$new_2_array = array_slice($students, -4,4);
echo "array slice; ";
pre($new_2_array);

// $s =  shuffle($students);

$numbers = range(1, 20);
shuffle($numbers);
foreach ($numbers as $number) {
    echo "$number ";
}




function pre($var)
{
    echo "<pre>";
    echo print_r($var);
    echo "</pre>";
}
