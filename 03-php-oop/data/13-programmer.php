<?php

class Programmer {
  public string $name;

  public function __construct(string $name) {
    $this->name = $name;
  }
}
class Frontend extends Programmer {
}
class Backend extends Programmer {
}

class Company {
  public Programmer $programmer;
}

function sayHello(Programmer $programmer) {
  // instanceof untuk mengecek object dari tipe data atau class yang mana
  if ($programmer instanceof Frontend) {
    echo "Hello Frontend $programmer->name" . PHP_EOL;
  } else if ($programmer instanceof Backend) {
    echo "Hello Backend $programmer->name" . PHP_EOL;
  } else if ($programmer instanceof Programmer) {
    echo "Hello Programmer $programmer->name" . PHP_EOL;
  }
}