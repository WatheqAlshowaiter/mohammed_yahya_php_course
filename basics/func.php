<?php


if (!function_exists('pre')) {

    function pre($var)
    {
        echo '<pre>';
        print_r($var);
        echo '</pre>';
    }
}

// echo ord('a');

// echo chr(97);

$string = 'some another way to speak';


echo filter_var(2, FILTER_SANITIZE_NUMBER_INT);
// $newString =  chunk_split($string, 3);
$newString =  str_split($string, 3);

// array_walk($newString, 'the_trim');



foreach($newString as $n){
    trim($n);
}
// $thirdString = explode(' ', $newString);


// echo($newString);
pre($newString);

// pre($thirdString);
