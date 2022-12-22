<?php

// Break
$counter = 1;
while (true) {
  echo "This is while-$counter" . PHP_EOL;
  $counter++;

  if ($counter > 5) {
    break;
  }
};

// Continue
for ($i = 1; $i <= 20; $i++) { 
  if ($i % 2 === 1) {
    continue;
  }
  
  echo "Counter : $i\n";
}