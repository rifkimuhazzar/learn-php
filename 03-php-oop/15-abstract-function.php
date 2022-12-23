<?php

require_once "data/15-animal.php";

$cat = new Cat();
$cat->name = "A";
$cat->run();

$dog = new Dog();
$dog->name = "B";
$dog->run();