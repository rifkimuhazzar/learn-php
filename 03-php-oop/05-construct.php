<?php

require_once "data/person3.php";

$person = new Person("Rifki 100", "Indonesia");
$person->name = "Rifki";
$person->role = "Web Developer";

var_dump($person) . PHP_EOL;
// var_dump($person->name) . PHP_EOL;
