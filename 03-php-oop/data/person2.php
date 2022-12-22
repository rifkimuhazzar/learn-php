<?php

class Person {
  var string $name;
  var ?string $role;
  var string $city = "Singapore";

  // this untuk mengakses object yang di buat dari class ini 
  function sayHello(?string $name) {
    if (is_null($name)) {
      echo "Hi, my name is $this->name" . PHP_EOL; 
    } else {
      echo "Hi $name, my name is $this->name" . PHP_EOL; 
    }
  }
}