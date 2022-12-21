<?php

$data = [1, 2, 3, 4, 5];

$mapFunction = fn (int $value) => $value * 10;
$result = array_map($mapFunction, $data);
var_dump($result);

rsort($data);
var_dump($data);

var_dump(array_keys($data));
var_dump(array_values($data));

$person = [
  "firstName" => "Rifki",
  "lastName" => "Muhazzar",
  "role" => "Web Developer", 
];

var_dump(array_keys($person));
var_dump(array_values($person));