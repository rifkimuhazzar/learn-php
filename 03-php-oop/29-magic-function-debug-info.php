<?php

require_once "data/27-student.php";

$student = new Student();
$student->id = "1";
$student->name = "Rifki";
$student->value = 100;
$student->setSample("This is sample");
var_dump($student);