<?php

require_once "data/13-programmer.php";

$company = new Company();
$company->programmer = new Programmer("Rifki 1");
var_dump($company);

// bisa menggunakan childnya
$company->programmer = new Frontend("Rifki 2");
var_dump($company);

$company->programmer = new Backend("Rifki 3");
var_dump($company);

sayHello(new Programmer("A"));
sayHello(new Frontend("B"));
sayHello(new Backend("C"));