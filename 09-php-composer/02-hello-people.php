<?php

require_once "vendor/autoload.php";
use MyClass\Data\People;

$people = new People("Rifki");
echo $people->sayHello("Muhazzar");