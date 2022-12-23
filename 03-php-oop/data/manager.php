<?php

class Manager {
  var string $name;
  var string $title;

  function __construct(string $name = "", string $title = "Manager") {
    $this->name = $name;
    $this->title = $title;
  }

  function sayHello(string $name): void {
    echo "Hello $name, my name is Manager $this->name" . PHP_EOL;
  }
}

class VicePresident extends Manager {
  // function overriding, ini tidak di rekomendasikan jika argumentnya berkurang/bertambah
  function sayHello(string $name): void {
    echo "Hello $name, my name is VP $this->name" . PHP_EOL;
  }

  // constructor overriding, bisa mengurangi/menambah argumentnya
  function __construct(string $name = "") {
    // tidak wajib tapi direkomendasikan memanggil constructor parentnya juga
    parent::__construct($name, "VP"); 
  }
}