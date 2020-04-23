<?php

$path = dirname(realpath(__FILE__)) . DIRECTORY_SEPARATOR . 'sessions';

session_save_path($path);

session_start();


$_SESSION['message'] = 'Welcome to my sessions';
$_SESSION['message2'] = 'Welcome 2 to my sessions';

session_write_close();
session_start();
$_SESSION['message3'] = 'Welcome 3 to my sessions';

var_dump($_SESSION);
