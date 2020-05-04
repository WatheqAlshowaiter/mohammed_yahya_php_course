<?php
$connection =  null;

try {
    $connection = new PDO(
        'mysql:host=localhost;dbname=mo_yahya_test',
        'root',
        '',
        [PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8', PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
    );
} catch (PDOException $e) {
}
