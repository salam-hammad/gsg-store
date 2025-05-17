<?php

namespace Hammad\Classes; 

abstract class Person
//final class Person
{
    //Constants 
    const MALE = 'm';
    const FEMAIL = 'f';

    //Properteis
    private $id;
    protected $birthday;
    protected $gender;
    public $name;

    protected $attrs = [];

    // Static properteis
    public static $job = 'Mentor';

    // Methods

    // Constructor 
    public function __construct($name = null, $gender = null, $birthday = null)
    {
        $this->id = uniqid();
        $this->name = $name;
        $this->setGender($gender);
        $this->setBirthday($birthday);
    }

    // Dstructor
    public function __destruct()
    {
        // echo 'Object deleted';
    }
    //Setters methods
    public function setBirthday($birthday)
    {
        $date = new \DateTime($birthday);
        if ($date >= new \DateTime('now')){
            throw new \InvalidArgumentException('Birthday cannot be in future.');
        }
        $this->birthday = $birthday;
        return $this;
    }
     
    public function setGender($gender)
    {
        $this->gender = $gender;
        return $this;
    }

    //Getters methods
    public function getBirthday()
    {
        return $this->birthday;
    }

    public function getGender()
    {
        return $this->gender;
    }

    abstract function getAge();

    // Static Methods
    public static function setJob($job)
    {
        // Person::$job = $job;
        // self::$job = $job;
        static::$job = $job;
        // return new self();
        return new self();
        return new Person();
    }

    // Magic Methods
    public function __toString()
    {
        // return 'LARAVEL';
        return $this->name;
    }

    public function __set($name, $value)
    {
        // echo " $name: $value \n";
        $this->attrs[$name] = $value;
    }

    public function __get($name)
    {
        // echo $name . "\n";
        return $this->attrs[$name] ?? null;
    }

    public function __call($name, $arguments)
    {
        echo $name . "\n";
    }

    public static function __callStatic($name, $arguments)
    {
        echo $name . "(Static)\n";
    }
}

/*
// Side effect code

// Person::setJob('Developer')->setGender('m');
$developer = Person::setJob('Developer');

$person = new Person('Salam');

$salam = new Person('Salam', Person::FEMAIL, '27-1-2003');
echo $salam::$job . "\n";
// echo $salam::$job = 'Consultant' . "\n";

$salam->getAge();
Person::getAge();

$salam->age = 22;
echo $salam->age;
echo $salam . "\n";

$majd = new Person('Majd');
$majd->setGender(Person::MALE);
$majd->setBirthday('30-6-2000');
echo $majd::$job . "\n";

echo $majd . "\n";

var_dump($salam, $majd);

exit; 

// $person->gender = 'male';
$person->setGender(Person::MALE)
->setBirthday('27-1-2003');

$person2 = $person; // Assign by reference
$person3 = clone $person; // Cloning (Assign by value)

// $person2->setGender(Person::FEMAIL);
$person3->setGender(Person::FEMAIL);

echo $person->getGender() . "\n";
echo $person->getBirthday() . "\n";
echo $person3->getGender();

*/