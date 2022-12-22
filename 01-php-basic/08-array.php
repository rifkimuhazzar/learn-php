<?php

// cara 1
$value = array(1, 2, 3.5, "Hello");
var_dump($value);

// cara 2
$value2 = [4, 5, 6.5, "World"];
var_dump($value2);

var_dump($value2[2]);

$value2[1] = 4.5;
var_dump($value2);

unset($value2[1]);
var_dump($value2);

$value2[] = "Rifki";
var_dump($value2);

var_dump(count($value2));

// Array Map // default keynya adalah index dari 0
// Cara 1
$rifki = array(
  "id" => "rifki",
  "name" => "Rifki Muhazzar",
  "age" => 22,
  "address" => array(
    "city" => "Batam",
    "country" => "Indonesia",
  )
);
var_dump($rifki);
var_dump($rifki["name"]);
var_dump($rifki["address"]["country"]);

// Cara 2
$rifki2 = [
  "id" => "rifki 2",
  "name" => "Rifki Muhazzar 2",
  "age" => 20,
  "address" => [
    "city" => "Batam",
    "country" => "Indonesia",
  ]
];
var_dump($rifki2);
var_dump($rifki2["name"]);
var_dump($rifki2["address"]["city"]);