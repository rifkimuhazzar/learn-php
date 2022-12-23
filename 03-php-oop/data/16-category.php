<?php

class Category {
  // Encapsulation - biasanya menggunakan private di semua propsnya
  private string $name;
  private bool $expensive;
  
  // getter and setter
  public function getName(): string {
    return $this->name;
  }
  public function setName(string $name): void {
    if (trim($name) != "") {
      $this->name = $name;
    }
   
  }

  // getter and setter
  public function isExpensive(): bool {
    return $this->expensive;
  }
  public function setExpensive(bool $expensive): void {
    $this->expensive = $expensive;
  }
}