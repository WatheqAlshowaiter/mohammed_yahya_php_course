<?php

// function __autoload($className)
// {
//     require strtolower($className) . '.class.php';
// }

function myAutoLoader($className)
{
    require strtolower($className) . '.class.php';
}

spl_autoload_register('myAutoLoader');


// echo get_include_path();
// echo PATH_SEPARAT OR;

echo dirname(realpath(__FILE__));
define('APP_PATH',  dirname(realpath(__FILE__)));
define('DS' , DIRECTORY_SEPARATOR);
define('PS' ,PATH_SEPARATOR);

define('CONTROLLERS_PATH' ,APP_PATH . DS . 'controllers');
define('MODELS_PATH' ,APP_PATH . DS . 'models');

echo $paths = get_include_path() . PS . CONTROLLERS_PATH . PS . MODELS_PATH;

set_include_path($paths); 

$a = new A;
$B = new B;
$c = new C;


