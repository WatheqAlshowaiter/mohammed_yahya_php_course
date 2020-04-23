<?php

class Student
{
    public $name;
    private $age;
    private $data  = [];
    // when writing data to inaccessable property
    public function __set($name, $value)
    {
        // echo "ffff  ";
        // $this->$name = $value;
        $this->data[$name] = $value;
    }

    public function __get($key)
    {
        if (array_key_exists($key, $this->data)) {
            return $this->data[$key];
        } else {
            trigger_error('Sorry no key '  . $key . ' Found in the data ' .  E_USER_ERROR . '<br>');
        }
    }

    public function __isset($name)
    {
        if (property_exists($this, $name)) {
            echo "property found";
        } else {
            echo "The property name <b style='color:red'>" . $name . "</b> will be clicked";
        }
    }

    public function __unset($name)
    {
        if (isset($this->$name)) {
            unset($this->data[$name]);
        }
    }

    public function __call($name, $arguments)
    {
        echo 'function ' . $name . ' was not found';
    }
}

$mohammed = new Student;
// $mohammed->age = 16;

echo $mohammed->age;

// pre($mohammed);


isset($mohammed->test);

unset($mohammed->age);
echo $mohammed->age;


$mohammed->sayHi();

function pre($var)
{

    if (is_array($var)) {
        echo "<pre>";
        echo print_r($var);
        echo "</pre>";
    } else {
        echo "<pre>";
        echo var_dump($var);
        echo "</pre>";
    }
}

function pred($var)
{
   pre($var);
    die;
}

$ali = [1,2];


// pre($ali);
pre($ali);
echo "after";
