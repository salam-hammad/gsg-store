<?php

namespace Hammad\Salam; 

// use Person;
use Hammad\Classes\Person; 
use HasName;
use HasJob;
use HasJobTitle;
use Hammad\Teacher as HammadTeacher;

/*

include __DIR__ . '/Student.php'; // require
include_once __DIR__ . '/Person.php'; // require_once 
include_once __DIR__ . '/HasJobTitle.php'; 
include __DIR__ . '/HasName.php'; 
include __DIR__ . '/HasJob.php'; 

*/
// Relative namespace
// class Teacher extends \Hammad\Classes\Person implements \HasName, \HasJob 

class Teacher extends Person implements HasName, HasJob
{
    // use \HasJobTitle;
    use HasJobTitle;

    public $courses = [];

    // public $title;

    public function __construct($name = null, $gender = null, $birthday = null, $title = null)
    {
        new HammadTeacher();
        parent::__construct($name, $gender, $birthday);
        // $this->id = uniqid();
        // $this->$name = $name;
        // $this->$gender = $gender;
        // $this->$birthday = $birthday;
        $this->$title = $title;
    }

    public function setGender($gender)
    {
        // echo __METHOD__;
        // $this->$gender;
        // return $this;
        return parent::setGender($gender);
    }

    // public function addCourse($name)
    public function addCourse($courses)
    {
        $this->$courses[] = $courses;
        // $this->$courses[] = $name;
        return $this;
    }

    public function setTitle($title)
    {
        $this->$title = $title;
        return $this;
    }

    public function getAge(){
        return 22;
    }

    public function getName(){
        return $this->name;
    }

    public function getTitle(){
        return $this->title;
    }
   
}

/*
// Side effect code

// $person = new Person();
try{
    // $teacher = new Teacher('Salam', 'f', '2003-1-27', 'Developer');
    $teacher = new Teacher('Salam', 'f', '2026-1-27', 'Developer'); // Date Time Exception
} catch (InvalidArgumentException $e) {
    echo "Error 1:" . $e->getMessage();
} catch (RuntimeException $e) { //Exception - Throwable
    echo "Error 2:" . $e->getMessage();
}

// $teacher->setGender('m');
// echo $teacher->getGender();

// var_dump($teacher);

if ($teacher instanceof Teacher){
    echo 'YES' . "\n"; // YES
}

if ($teacher instanceof Person){
    echo 'YES' . "\n"; // YES
}

if ($teacher instanceof HasName){
    echo 'YES' . "\n"; // YES
}

if ($teacher instanceof HasJob){
    echo 'YES' . "\n"; // YES
}


if ($teacher instanceof Student){
    echo 'YES'; // NO
}

*/