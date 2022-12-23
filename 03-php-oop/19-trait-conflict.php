<?php

trait A {
  function doA(): void {
    echo "A - A" . PHP_EOL;  
  }

  function doB(): void {
    echo "A - B" . PHP_EOL;  
  }
}

trait B {
  function doA(): void {
    echo "B - A" . PHP_EOL;  
  }

  function doB(): void {
    echo "B - B" . PHP_EOL;  
  }
}

class Sample {
  use A, B {
    // gunakan insteadof untuk memperbaiki conflict
    A::doA insteadOf B;
    B::doB insteadof A;
  }
}

$result = new Sample();
$result->doA();
$result->doB();