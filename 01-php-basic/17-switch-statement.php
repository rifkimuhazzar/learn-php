<?php
// switch hanya untuk perbandingan ==

$value = "A";

switch ($value) {
  case "A":
    echo "Lulus dengan baik\n";
    break;
  case "B":
  case "C":
    echo "Lulus" . PHP_EOL;
    break;
  default:
    echo "Tidak lulus" . PHP_EOL;
}

// Syntax Alternative
switch ($value):
  case "A":
    echo "Lulus dengan baik\n";
    break;
  case "B":
  case "C":
    echo "Lulus" . PHP_EOL;
    break;
  default:
    echo "Tidak lulus" . PHP_EOL;
endswitch;
