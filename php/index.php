<?php

namespace Hammad\Salam; 

// Autoload
spl_autoload_register(function($classname) {
    echo $classname . "\n\n";
    // include __DIR__ . '/' . basename($classname) . '.php';
    include __DIR__ . '/' . str_replace('\\', '/', $classname) . '.php';

});

$teacher = new Teacher('Salam');
$teacher->setGender('f');
echo $teacher->getName();

// $student = new Student('Majd');
// echo $student->getBirthday();