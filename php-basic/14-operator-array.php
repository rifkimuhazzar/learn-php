<?php
// == | === | != . <> | !== | +

$firstName = [
  "firstName" => "Rifki",
];
$lastName = [
  "lastName" => "Muhazzar",
  "firstName" => "Hello",
];
$fullName = $firstName + $lastName;
var_dump($fullName);

$a = [
  "firstName" => "Rifki",
  "lastName" => "Muhazzar",
];
$b = [
  "lastName" => "Muhazzar",
  "firstName" => "Rifki",
];
var_dump($a == $b);
var_dump($a === $b);