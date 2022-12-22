<?php

$person = ["Rifki", "Muhazzar", "Web Developer"];

for ($i = 0; $i < count($person); $i++) { 
  echo "Data $i = $person[$i]" . PHP_EOL; 
}

foreach ($person as $i) {
  echo "Data : $i" . PHP_EOL;
}

foreach ($person as $h => $i) {
  echo "Data $h : $i" . PHP_EOL;
}

$person2 = [
  "firstName" => "Rifki", 
  "lastName" => "Muhazzar", 
  "role" => "Web Developer",
];

foreach ($person2 as $key => $value) {
  echo "Data - $key = $value" . PHP_EOL;
}