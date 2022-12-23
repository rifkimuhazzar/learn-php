<?php

require_once "data/27-student.php";

$student = new Student();
$student->id = "1";
$student->name = "Rifki";
$student->value = 100;
$student->setSample("Hello World");
var_dump($student);

// clone
// urutan = student => clone student2 => student2 __clone() ini optional dan digunakan di classnya
$student2 = clone $student;
var_dump($student2);

// clone manual
// $student3 = new Student();
// $student3->id = $student->id;
// $student3->name = $student->name;
// $student3->value = $student->value;
// var_dump($student3);