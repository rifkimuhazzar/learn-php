<?php

require_once "data/08-conflict.php";

// use tidak bisa mengimport yang nama class/function/const nya sama
use data\Conflict;
use data\two\Conflict as Conflict2; // alias
use function say\{sayHello, sayHi as hi}; // grup use
use const say\APP as A; // alias

$conflict1 = new Conflict();
$conflict2 = new Conflict2();

sayHello();
hi();
echo A . PHP_EOL;