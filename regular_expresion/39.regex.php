<?php

// {min, max}
// {min, }
// {min}

$pattern = '/\w+?_\d{2,4}\.[a-z]{3,5}/';
$str = "file07_2015.xls, doc04_2018.doc, document09_2020.pwt";

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
