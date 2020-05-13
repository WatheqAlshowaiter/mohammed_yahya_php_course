<?php

namespace PHPMVC;

ini_set('display_errors', 'On');
error_reporting(E_ALL);

use PHPMVC\LIB\FrontController;

error_reporting(E_ALL);

if (!defined('DS')) {
    define('DS', DIRECTORY_SEPARATOR);
}

require_once '..' . DS . 'app' . DS . 'config.php';
require_once APP_PATH . DS . 'lib' . DS . 'autoload.php';

session_start();

$frontController = new FrontController();
$frontController->dispatch();
