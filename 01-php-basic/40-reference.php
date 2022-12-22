<?php

$name = "Rifki";
$role = &$name;
$role = "Muhazzar";

echo $name . PHP_EOL;

function increment(int &$value) {
  $value++;
}
$counter = 1;
increment($counter);
increment($counter);

echo $counter . PHP_EOL;

// gunakan returning referrence jika memang dibutuhkan saja
function &getValue(){
  static $value = 100;
  return $value;
}

$a = &getValue();
$a = 200;
$b = &getValue();

echo $a . PHP_EOL;
echo $b . PHP_EOL;