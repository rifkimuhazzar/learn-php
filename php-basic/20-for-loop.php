<?php

for ($i = 1; $i <= 5; $i++) { 
  echo "This is for loop-$i" . PHP_EOL;
};

for ($i = 5; $i >= 1; $i--) { 
  echo "This is for loop-$i" . PHP_EOL;
};

// Syntax Alternative
for ($i = 1; $i <= 5; $i++): 
  echo "This is for loop-$i" . PHP_EOL;
endfor;