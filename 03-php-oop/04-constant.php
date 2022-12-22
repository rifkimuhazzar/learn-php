<?php

require_once "data/person2.php";

define("APP", "Belajar PHP OOP"); // cara lama membuat constant
const APP_VERSION = "1.0.0"; // cara baru membuat constant

echo APP . PHP_EOL;
echo APP_VERSION . PHP_EOL;

echo Person::AUTHOR . PHP_EOL; // untuk mengakses constant pada class

$person = new Person();
$person->info();