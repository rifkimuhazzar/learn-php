<?php

require_once "data/person.php";

$person = new Person();
$person->name = "Rifki";
$person->role = "Web Developer";
// $person->city = "Singapore";

var_dump($person);

// tanda panahnya tidak bisa menggunakan spasi jika di dalam string
echo "Name : $person->name" . PHP_EOL;
echo "Role : $person->role" . PHP_EOL;
echo "City : $person->city" . PHP_EOL;

// 2
$person = new Person();
$person->name = null;
$person->role = "Web Developer 2";
// $person->city = "Singapore 2";

var_dump($person);

// error
// $person->name = [];