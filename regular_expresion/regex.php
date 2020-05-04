<?php


$pattern = '/man/';
$str = 'The man going to his home anf the
         man goes to the factory. its mandotary. 
        its amanda';

// var_dump(preg_match($pattern, $str));

preg_match($pattern, $str, $match);
preg_match_all($pattern, $str, $match2);

pre($match);
pre($match2);

// Meta character - wild card (.)

$pattern = '/h.t/';
$str = 'Hot, hat, hot, hit, h$t, h.t, h
t'; // new line
preg_match_all($pattern, $str, $match);
pre($match);

$pattern = '/h.../';
$str = 'heat, I have hear, heal';
preg_match_all($pattern, $str, $match);
pre($match);




// for debugging purposes
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
