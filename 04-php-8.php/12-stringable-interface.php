<?php

function sayHello(Stringable $stringable): void {
  // Stringable hanya memiliki 1 function saja yaitu __toString()
  echo "Hello {$stringable->__toString()}" . PHP_EOL;
} 

class Person1 {
  public function __toString(): string {
    return "person";
  }
}

sayHello(new Person1());