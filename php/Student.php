<?php

// include __DIR__ . '/Person.php'; // require
use Hammad\Classes\Person;

class Student extends Person 
{
    public $courses = [];
    // public $courses;

    public function addCourse($courses)
    {
        // $this->$courses[] = $name;
        $this->$courses[] = $courses;
        return $this;
    }

    public function getAge(){
        return 22;
    }
}

/*
// Side effect code
$student = new Student();
$student->name = 'Salam';
$student->setGender(Person::FEMAIL);
$student->addCourse('Laravel');

var_dump($student);
*/