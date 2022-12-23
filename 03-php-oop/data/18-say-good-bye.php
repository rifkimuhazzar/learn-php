<?php

// trait mirip abstract class
// bisa membuat konkret function, abstract function, props
// trait bisa ditambahkan ke class lebih dari 1
// trait mirip seperti extension
// gunakan use untuk menggunakan trait di class

namespace Data\Traits;

trait SayGoodBye {
  public string $name;
  public function goodBye(?string $name): void {
    if (is_null($name)) {
      echo "Good bye" . PHP_EOL;
    } else {
      echo "Good bye $name" . PHP_EOL;
    }
  }
}

trait SayHello {
  public string $name;
  public function hello(?string $name): void {
    if (is_null($name)) {
      echo "Hello" . PHP_EOL;
    } else {
      echo "Hello $name" . PHP_EOL;
    }
  }
}

trait HasName {
  public string $name;
}

// gunakan use untuk megambil isi trait
class Person {
  use SayGoodBye, SayHello, HasName;
}