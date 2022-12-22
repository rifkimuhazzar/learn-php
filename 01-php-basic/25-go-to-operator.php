<?php

goto a;
echo "Hello World" . PHP_EOL;

a:
echo "Hello A" . PHP_EOL;

$counter = 1;
while (true) {
  echo "This is while-$counter" . PHP_EOL;
  $counter++;

  if ($counter > 5) {
    goto b;
  }
};

b:
echo "End loop";