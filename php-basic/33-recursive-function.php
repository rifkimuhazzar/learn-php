<?php

function factorialLoop($value) {
  $total = 1;

  for ($i = 1; $i <= $value; $i++) { 
    $total *= $i;
  }

  return $total;
}
var_dump(factorialLoop(5));

// problem recusive adalah jika terlalu dalam maka bisa menyebabkan memory error
function factorialRecursive($value) {
  if ($value == 1) {
    return 1;
  } else {
    return $value * factorialRecursive($value - 1);
  }
}
echo factorialRecursive(5);