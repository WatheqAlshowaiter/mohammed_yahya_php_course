<?php

class aaa
{
    private $name = "sf";
}


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

// $ali = [1,2];
$ali = new aaa;


// pre($ali);
pre($ali);
echo "after";
