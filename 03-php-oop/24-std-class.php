<?php

// stdClass adalah class kosong bawaan PHP
// biasa digunakan untuk konversi dari tipe data lain ke object
// bisa untuk mengkonversi array ke object dan juga sebaliknya

$array = [
  "firstName" => "Rifki",
  "lastName" => "Muhazzar",
  "role" => "Web Developer",
];

$object = (object) $array; // akan dibuat stdClass secara otomatis
var_dump($object);

echo $object->firstName . PHP_EOL;
echo $object->lastName . PHP_EOL;
echo $object->role . PHP_EOL;

$backToArray = (array) $object;
var_dump($backToArray);

// konversi class menjadi array
require_once "data/person3.php";
$person = new Person("Rifki", "Singapore 2");
var_dump($person);

$personArray = (array) $person;
var_dump($personArray);