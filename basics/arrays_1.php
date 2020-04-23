<?php

$salaries = [1100, 2230, 5506, 2345];

list($s1, $s2) = $salaries;

echo $s1, ' ',  $s2;

// 3rd parameters = step 2= 0, 2, 4 , etc.
$numbers = range(0, 13, 2); 

echo "<pre>";
print_r($numbers);
echo "</pre>";


$letters = range('a', 'z', 3); 

echo "<pre>";
print_r($letters);
echo "</pre>";
