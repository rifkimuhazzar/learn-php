<?php

$value = 95;
$present = 100;

if($value >= 90 && $present >= 95) {
  echo "A" . PHP_EOL;
} else if($value >= 80 && $present >= 85) {
  echo "B" . PHP_EOL;
} elseif($value >= 70 && $present >= 75) {
  echo "C" . PHP_EOL;
} else {
  echo "Try again" . PHP_EOL;
}

// Cara 2
if($value >= 90 && $present >= 95):
  echo "A" . PHP_EOL;
elseif($value >= 80 && $present >= 85):
  echo "B" . PHP_EOL;
elseif($value >= 70 && $present >= 75):
  echo "C" . PHP_EOL;
else:
  echo "Try again" . PHP_EOL;
endif;