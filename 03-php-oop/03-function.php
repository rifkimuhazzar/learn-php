<?php

require_once "data/person2.php";

$person = new Person();
$person->name = "Rifki 1";
$person->sayHello("Rifki");

$person2 = new Person();
$person2->name = "Rifki 2";
$person2->sayHello(null);