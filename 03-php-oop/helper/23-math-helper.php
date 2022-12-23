<?php

// static di gunakan di dalam class agar props/function nempel ke classnya
// jadi tidak bisa di instansiasi lagi, ini mirip seperti constant di dalam class
class MathHelper {
  static public string $name = "MathHelper";

  static public function sum(int ...$numbers): int {
    $total = 0;
    foreach ($numbers as $number) {
      $total += $number;
    }
    return $total;
  }
}
