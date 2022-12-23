<?php

// iterator manual
function getGenap(int $max): iterator {
  $array = [];
  for ($i = 1; $i <= $max; $i++) { 
    if ($i % 2 == 0) {
      $array[] = $i;
    }
  }
  return new ArrayIterator($array);
}
foreach (getGenap(10) as $value) {
  echo "Genap : $value" . PHP_EOL;
}

// iterator otomatis
function getGanjil(int $max): Iterator {
  for ($i = 1; $i <= $max; $i++) { 
    if ($i % 2 == 1) {
      yield $i; // yield adalah object generator untuk generate iterator secara otomatis
    }
  }
}
foreach (getGanjil(10) as $value) {
  echo "Ganjil : $value" . PHP_EOL;
}