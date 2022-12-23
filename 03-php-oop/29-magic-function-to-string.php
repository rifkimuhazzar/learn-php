<?php

require_once "data/27-student.php";

$student = new Student();
$student->id = "1";
$student->name = "Rifki";
$student->value = 100;
$student->setSample("Hello World");

// mengkonversi object ke string harus menggunakan magic function __toString()
// magic function adalah function yang sudah ditentukan kegunaannya oleh php
$string = (string)$student;
echo $string . PHP_EOL;
echo $student . PHP_EOL;
