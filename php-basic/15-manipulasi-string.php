<?php

$name = "Rifki Muhazzar";
echo "Name: " . $name . PHP_EOL;
echo "Value: " . 100;

$valueString = (string)100;
var_dump($valueString);
$valueInt = (int)"100";
var_dump($valueInt);
$valueFloat = (float)"1.85";
var_dump($valueFloat);

$name = "Rifki";
echo $name[0] . PHP_EOL;
var_dump($name[0]);
var_dump($name[1]);

echo "Hello $name\n";

echo "Hello {$name}Muhazzar";