<?php

$firstName = "Rifki";
$lastName = "Muhazzar";

// arrow function digunakan untuk membuat function sederhana
// hanya bisa 1 baris, tanpa {}, dan mengembalikan value
$sayHello = fn() => "Hello $firstName $lastName" . PHP_EOL;

echo $sayHello();