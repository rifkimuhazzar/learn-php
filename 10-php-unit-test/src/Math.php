<?php

namespace MyClass\Test;

use SebastianBergmann\CodeCoverage\Report\Xml\Totals;

class Math {

  public static function sum(array $values): int {
    $total = 0;
    foreach ($values as $value) {
      $total += $value;
    }
    return $total;
  }

}