<?php

namespace PHPMVC\LIB\Database;


class PDODatabaseHandler extends DatabaseHandler
{
    protected static $_instance;
    private static $_handler;

    private function __construct()
    {
        self::init();
    }

    public function __call($name, $arguments)
    {
        return call_user_func_array([self::$_handler, $name], $arguments);
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
            echo "error: " .  $e->getMessage();
        }
    }

    protected static function getInstace()
    {
        if (self::$_handler === null) {
            self::$_handler = new self();
        }
        return self::$_handler;
    }
}
