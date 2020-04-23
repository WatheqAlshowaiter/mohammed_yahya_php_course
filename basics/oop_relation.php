<?php


/**
 * Association 
 * Aggregation
 * Composition
 */

/**
 * Senarios
 * 1. The WebDevTrainer is a Type of Trainer (Inheritance)
 * 2. The WebDevTrainer uses a book as a reference (Association)
 * 3. The TrainingProgram can have many students  (Aggregation)
 * 4. The WebDevelopmentTrainer is responsible of ensuring the success of the training program
 *    The WebDevTrainer's salary will be raised if the traing rate is good enough (Composition)
 */


class Trainer
{
    public $name;
    public $age;
    public $rate;
}

class WebDevTrainer extends Trainer
{

    public function isTheTrainerQualified()
    {
    }

    public static function addBook(Book $book)
    {
    }
    public function paySalary()
    {
        if ($this->rate == true) {
            echo "you have your salary this month";
        }
    }
}


class Book
{
    public $title;
    public $author;
    public $isbn;

    public function canBeBorrowed()
    {
    }

    public static function isBorrowBy(Trainer $trainer)
    {
        return $trainer->name;
    }
}

class TrainingProgram
{
    public $title;
    public $studentList;
    public $trainer;

    public function showStudentList()
    {
        return $this->studentList;
    }

    public function addStudent(Student $student)
    {
        $this->studentList[] = $student;
    }

    public function isTrainerGood(Trainer $trainer)
    {
        $trainer->rate = true;
    }
}

class Student
{
    public $name;
    public $age;
}
