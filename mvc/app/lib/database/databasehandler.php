<?php

namespace PHPMVC\LIB\Database;

abstract class DatabaseHandler
{
    const DATABASE_DRIVER_PDO = 1;
    const DATABASE_DRIVER_MYSQLI = 2;

    private function __construct()
    {
    }

    abstract protected static function init();

    abstract protected static function getInstace();

    public static function factory()
    {
        $driver = DATABASE_CONN_DRIVER;
        if ($driver =  self::DATABASE_DRIVER_PDO) {
            return PDODatabaseHandler::getInstace();
        } elseif ($driver == self::DATABASE_DRIVER_MYSQLI) {
            return MySQLDatabaseHandler::getInstace();
        }
    }
}
