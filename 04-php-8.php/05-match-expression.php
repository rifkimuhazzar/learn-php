<?php

use LDAP\Result;

$value = "A";
$result;
switch ($value) {
  case "A":
  case "B":
  case "C":
    $result = "Anda Lulus";
    break;
  case "D":
    $result = "Anda Tidak Lulus";
    break;
  case "D":
    $result = "Mungkin anda salah jurusan";
    break;
  default:
    $result = "Nilai apa itu?";
}
echo $result . PHP_EOL;

// mirip seperti ternary, tapi match bisa lebih banyak kondisi
$result = match($value) {
  "A", "B", "C" => "Anda Lulus",
  "D" => "Anda tidak lulus",
  "E" => "Mungkin anda salah jurusan",
  default => "Nilai apa itu?"
};
echo $result . PHP_EOL;

$value = 90;
$result = match(true) {
  $value >= 90 => "A",
  $value >= 80 => "B",
  $value >= 70 => "C",
  $value >= 60 => "D",
  $value < 60 => "E",
};
echo $result . PHP_EOL;

$name = "Mr. Rifki Muhazzar";
$result = match(true) {
  str_contains($name, "Mr.")=> "Hello sir",
  str_contains($name, "Mrs.") => "Hello mam",
  default => "Hello"
};
echo $result . PHP_EOL;