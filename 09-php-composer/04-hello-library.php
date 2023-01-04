<?php

require_once "vendor/autoload.php";
use MyClass\Belajar\Customer;

$customer = new Customer("Rifki");

echo $customer->sayHello() . PHP_EOL;
echo $customer->sayHello("Muhazzar") . PHP_EOL;