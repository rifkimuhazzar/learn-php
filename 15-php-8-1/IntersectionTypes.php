<?php

interface HasBrand {
  function getBrand(): string;
}

interface HasName {
  function getName(): string ;
}

class Car implements HasBrand, HasName {

  private string $brand;
  private string $name;

  public function __construct(string $brand, string $name) {
    $this->brand = $brand;
    $this->name = $name;
  }

  public function getBrand(): string {
    return $this->brand;
  }

  public function getName(): string {
    return $this->name;
  }

}

function printBrandAndName(HasName & HasBrand $value) {
  echo $value->getBrand() . "-" . $value->getName() . PHP_EOL;
}

printBrandAndName(new Car("Ferrari", "SF90"));
printBrandAndName(new Car("Tesla", "Model S"));
