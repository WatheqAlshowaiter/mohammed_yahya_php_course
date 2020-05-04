<?php


// Character Sets 
// Character Ranges 
// Negation Meta Character - Negative Character Sets

$pattern = '/fl[oa4\]]t/'; // [ao], flat, flot but not float!
$str = "My flat rent is somrhow hight. the word flot is not exists, and what about float and fl4t, fl]t";

preg_match_all($pattern, $str, $found);

pre($found);


// Ranges: [a-z], [0-9]

$pattern = '/m[a-z]n/';
$str = "man, men, msg, mon";
preg_match_all($pattern, $str, $found);
pre($found);

$pattern = '/9[0-9][0-9]9/';
$str = "9001, 9002, 9999, 9849, 9651";
preg_match_all($pattern, $str, $found);
pre($found);

$pattern = '/[0-9][0-9][0-9]-[a-z][a-z]/'; // 129-sa
$str = "My zip code is 129-os and my friend is 934-sd";
preg_match_all($pattern, $str, $found);
pre($found);

// Negation Meta Character - Negative Character Sets
$pattern = '/e[^auioe]t/';
$str = "eat, eit, aut, est, ebt";
preg_match_all($pattern, $str, $found);
pre($found);

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
