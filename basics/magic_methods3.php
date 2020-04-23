<?php 

class Test 
{
    public $name;
    public $data = [1,2,3];
}

$test = new Test; 

var_export($test); 

echo '<hr>';

echo ' version: ' .  phpversion();
