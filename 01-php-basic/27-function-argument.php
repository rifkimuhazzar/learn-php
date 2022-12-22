<?php

function sayHello($firstName = "First name is empty - ", $lastName = "Last name is empty") {
  echo "Hello $firstName $lastName" . PHP_EOL;
}
sayHello("Rifki", "Muhazzar");
sayHello("Rifki 2", "Muhazzar 2");
sayHello();

// Type Declaration
function sum(int $first, int $second) {
  $total = $first + $second;
  echo "$first + $second = $total" . PHP_EOL;
}
// otomatis dikonversi ke int
sum(10, 10);
sum("10", "10");
sum(true, false);

// Variable-length argument list
// (array $values)
// digunakan sebagai argument akhir jika memiliki argument lebih dari 1
function sumAll(...$values) {
  $total = 0;
  foreach ($values as $key => $value) {
    $total += $value;
  }
  echo "Total " . implode(",", $values) . " = $total" . PHP_EOL;
}
sumAll(1, 2, 3, 4, 5);

$values = [10, 10, 10];
sumAll(...$values);