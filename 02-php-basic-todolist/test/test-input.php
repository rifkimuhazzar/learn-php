<?php

require_once "helper/input.php";

$name = input("Name");
echo "Hello $name" . PHP_EOL; 

$role = input("Role");
echo $role . PHP_EOL;