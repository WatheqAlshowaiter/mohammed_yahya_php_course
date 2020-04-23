<?php

/**
 * Traits
 * priority: child class > trait > parent class
 */

trait Test
{
    public function hello()
    {
        echo "hello traits";
    }

    protected function sayWelcome()
    {
        echo "welcome from traits";
    }
}

trait Test2 {
    public function hello()
    {
        echo "hello trait 2";
    }
}

class ParentClass
{
    public function hello()
    {
        echo "hello parent class";
    }
}

class childClass extends ParentClass
{
     
    // to reslove naming conflicts 
    // and use Test2 method instead 
    // of Test method
    use Test, Test2{
        // Test::hello insteadOf Test2;
        // Test2::hello as welcome;
    }
    use Test { 
        // Test:hello as protected;
    }
    
    

    public function callWelcome()
    {
        $this->sayWelcome();
    }

    // public function hello()
    // {
    //     echo "hello child class";
    // }
}



(new childClass())->hello();
echo "<br>";
(new childClass())->welcome();