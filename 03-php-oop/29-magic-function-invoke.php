<?php

require_once "data/27-student.php";

$student = new Student();
$student->id = "1";
$student->name = "Rifki";
$student->value = 100;
$student->setSample("Hello World"); 

// agar variable/objectnya bisa dianggap sebagai function, maka gunakan __invoke()
$student(1, "Rifki", true);