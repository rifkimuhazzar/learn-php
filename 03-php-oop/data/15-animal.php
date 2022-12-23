<?php

abstract class Animal {
  public string $name;

  // abstract function hanya bisa digunakan di dalam abstract class
  // saat membuat tidak bisa menggunakan block function
  // wajib di override di class child
  // bisa menggunakan argument ataupun tidak
  // bisa menggunakan type declaration ataupun tidak
 abstract public function run(): void;
}

class Cat extends Animal {
  public function run(): void {
    echo "Cat $this->name is running" . PHP_EOL;
  }
}

class Dog extends Animal {
  public function run(): void {
    echo "Dog $this->name is running" . PHP_EOL;
  }
}