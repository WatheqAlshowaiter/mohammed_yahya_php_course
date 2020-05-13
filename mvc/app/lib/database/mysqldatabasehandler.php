<?php

namespace PHPMVC\LIB\Database;


class MySQLDatabaseHandler extends DatabaseHandler
{
    private static $_handler;

    private function __construct()
    {
        self::init();
    }

    protected static function init()
    {
        try {
            self::$_handler = new
                \PDO(
                    'mysql:host=' . DATABASE_HOST_NAME . ';dbname=' . DATABASE_DB_NAME,
                    DATABASE_USER_NAME,
                    DATABASE_PASSWORD,
                    [
                        \PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8',
                        \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION
                    ]
                );
        } catch (\PDOException $e) {
        }
    }

    protected static function getInstace()
    {
        if (self::$_handler === null) {
            self::$_handler = new self();
        }
        return self::$_handler;
    }
    public function prepare()
    {
    }
}
