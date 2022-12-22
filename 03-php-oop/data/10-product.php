<?php

// var - public(default)= sama saja bisa diakses dari mana saja
// protected = bisa diakses di class dan subclass
// private = hanya bisa di akses di class sendiri

class Product {
  protected string $name;
  private int $price;

  public function __construct(string $name, int $price) {
    $this->name = $name;
    $this->price = $price;
  }

  function getName(): string {
    return $this->name . PHP_EOL;
  }

  function getPrice(): string {
    return $this->price . PHP_EOL;
  }
}

class ProductDummy extends Product {
  public function info() {
    echo "Name $this->name" . PHP_EOL;
    // echo "Name $this->price" . PHP_EOL;
  }
}