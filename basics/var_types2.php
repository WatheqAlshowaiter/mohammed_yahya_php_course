<?php

if (!function_exists('pre')) {

    function pre($var)
    {
        echo '<pre>';
        print_r($var);
        echo '</pre>';
    }
}


// Super global variables
//  $_GET, $_POST, $_REQUEST ,$_SERVER,
//  $_SESSION, $_COOKIE, $_FILES, $_ENV

// pre($_SERVER);


// Variable varialbels
$name = 'Ali';
$$name = 'Ali Mohammed';

echo $name; // 'Ali'
echo $$name; // 'Ali Mohammed'

echo $Ali; // 

echo "<br>";


// here doc 
echo <<<some_text
    here are some namese: $name, and $Ali;
some_text;


echo "<hr>";
// now doc = like single qoutatuon ' ' so, there is no parsing $variables but print them as they've been written
echo <<<'another_text'
    here ar some namese: $name, and $Ali;
another_text;
?> 
