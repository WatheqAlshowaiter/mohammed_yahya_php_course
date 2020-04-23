<?php


$salaries = [1100, 2230, 5506, 2345];

// more effecient
for ($i = 0, $k = count($salaries); $i < $k; $i++) {
    echo '<p>' . $salaries[$i] . '</p>';
}

// you can do it this way 
// this is moere readable
$salary_count = count($salaries);
for ($i = 0; $i < $salary_count; $i++) {
    echo '<p>' . $salaries[$i] . '</p>';
}
