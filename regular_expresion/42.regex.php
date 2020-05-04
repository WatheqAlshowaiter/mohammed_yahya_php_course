<?php

$string = "I to have go";

$newString = preg_replace("/(to) (have)/", "should $2 $1", $string);

echo $newString; 