<?php

// serialize()

$arr = [1, 2];

echo serialize($arr);



class Test
{
    public $name;
}

$obj = new Test;
$obj->name = 'ali';

// echo serialize($obj); 


// Serialize: convert obj/array = string

class Database
{
    public $link;
    public $dsn;
    public $queryCashe;
    public $username;
    public $password;

    public function __construct($dsn, $username, $password)
    {
        $this->dsn = $dsn;
        $this->link = new PDO($dsn, $username, $password);
    }

    public function __sleep()
    {
        return ['dsn', 'username'];
    }

    public function __wakeup()
    {
        $this->link =  new PDO($this->dsn, $this->username, $this->spassword);
    }

    public function __toString()
    {
        return  ' username = ' . $this->username . ' '; 
    }

    public function __invoke()
    {   
        // when you call an object as  a function
        echo 'welcome to the object'; 
    }
}

$obj = new Database('mysql=://hostnamel;dbname=elv;', 'root', '12345');

// var_dump($obj);

$seriliezed = serialize($obj);

$newObj  = unserialize($seriliezed);

var_dump($newObj);


$obj2 = new Database('saf','root', 123);
echo $obj;  

$obj();