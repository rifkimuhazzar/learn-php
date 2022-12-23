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

trait CanRun {
  // jika menggunakan abstract function di trait, maka harus di override di classnya
  public abstract function run(): void;
}

// gunakan use untuk megambil isi trait
// urutan override = ParentClass => Trait => ChildClass

class ParentPerson {
  public function hello(?string $name): void {
    echo "Hello in ParentPerson" . PHP_EOL;
  }
}

// inheritance trait hanya bisa sesama trait, caranya gunakan use
trait All {
  use SayGoodBye, SayHello, HasName, CanRun {
    // override visibility trait
    hello as public;
    goodBye as public;
  }
}

class Person {
  use All;

  public function run(): void {
    echo "Person $this->name is running" . PHP_EOL;
  }
}