<?php

interface HelloWorld {
  public function sayHello(): void;
}

// Anonymous class untuk membuat class langsung menjadi object
// bisa extends dari class lain, implements interface, dan use trait
// bisa menggunakan constructor dan destructor function
$helloWorld = new class("Rifki") implements HelloWorld {
  public string $name;

  public function __construct(string $name) {
    $this->name = $name;
  }

  public function sayHello(): void {
    echo "Hello $this->name" . PHP_EOL;
  } 
};
$helloWorld->sayHello();