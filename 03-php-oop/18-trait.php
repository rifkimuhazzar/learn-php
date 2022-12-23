<?php

require_once "data/18-say-good-bye.php";

use data\Traits\{Person, SayGoodBye, SayHello};

$person = new Person();
$person->goodBye("Rifki 1");
$person->hello("Rifki 2");

$person->name = "Rifki 3";
var_dump($person);
