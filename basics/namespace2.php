<?php



namespace Main\Controllers; 

error_reporting('E_ALL');

class TestController 
{
    public static function wakeup(){
        echo "wake up my fried"; 
    }
}

// 1- unquaified name: TestController();
// 2- quaified, prefixed name: Controllers\TestController();
// 3- fully quaified, prefixed wit global: \Main\Controllers\TestController();

// $test = new \Main\Controllers\TestController();

$a = __NAMESPACE__ . 'TestController';

// $test = new $a;

// var_dump($test);

// object on the fly
(new namespace\TestController);

(namespace\TestController::wakeup());

