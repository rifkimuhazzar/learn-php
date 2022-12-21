<?php

$sayHello = function(string $name) {
  echo "Hello $name" . PHP_EOL;
};
$sayHello("Rifki");

// 2
function sayGoodBye(string $name, $filter) {
  $result = $filter($name);
  echo "Goodbye $result" . PHP_EOL;
}
sayGoodBye("Rifki", function (string $name): string {
  return strtoupper($name);
});

$filter = function (string $name): string {
  return strtolower($name);
};
sayGoodBye("Rifki", $filter);

// Mengakses variable di luar anonymous function atau closure
$firstName = "Rifki";
$lastName = "Muhazzar";
// Cara 1
$sayHi = function ($firstName, $lastName) {
  echo "Hello $firstName $lastName" . PHP_EOL ;
};
$sayHi($firstName, $lastName);
// Cara 2
$sayHi = function () use ($firstName, $lastName) {
  echo "Hello $firstName $lastName" . PHP_EOL ;
};
$sayHi();