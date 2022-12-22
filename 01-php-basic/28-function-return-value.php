<?php

// Type declaration di return value
function sum(int $first, int $second): int {
  $total = $first + $second;
  return $total;
}
$result = sum(10, 10);
var_dump($result) . PHP_EOL;
echo $result . PHP_EOL;

function getFinalValue(int $value): string {
  if ($value >= 90) {
    return "A";
  } else if ($value >= 80) {
    return "B";
  } else if ($value >= 70) {
    return "C";
  } else if ($value >= 60) {
    return "D";
  } else {
    return "E";
  }

  echo "Hello World" . PHP_EOL;
}
$result2 = getFinalValue(90);
var_dump($result2);
echo getFinalValue(80);