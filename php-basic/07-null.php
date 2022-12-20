<?php

$name = "Rifki";
$name = null; // case insensitive

$age = null;

echo "Name: ";
echo $name;
echo "\n";

echo "Age: ";
echo $age;
echo "\n";

echo "Is name null: ";
var_dump(is_null($name));
echo "\n";

$number = 20;
unset($number); // menghapus variable
$number = "Hello";
var_dump(isset($number)); // untuk mengecek apakah variable ada dan tidak null