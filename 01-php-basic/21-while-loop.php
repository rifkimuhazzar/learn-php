<?php

$i = 1;
while ($i <= 5) { 
  echo "This is while loop-$i" . PHP_EOL;
  $i++;
};

// Syntax Alternative
$i = 5;
while ($i >= 1) :
  echo "This is while loop-$i" . PHP_EOL;
  $i--;
endwhile;