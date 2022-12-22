<?php

class Person {
  // constant di dialam class menempel ke classnya, jadi tidak butuh object
  const AUTHOR = "Rifki Muhazzar"; 

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

  function info() {
    // self digunakan untuk mengakses classnya sendiri
    echo "Author : " . self::AUTHOR . PHP_EOL; // sama dengan Person::AUTHOR
  }
}