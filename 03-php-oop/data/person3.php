<?php

class Person {
  const AUTHOR = "Rifki Muhazzar"; 

  var string $name;
  var ?string $role;
  var string $city = "Singapore";

  // constructor - haru smemasukkan argument saat membuat object
  function __construct(string $name, string $address) {
    $this->name = $name;
    $this->address = $address;
  }

  // destructor - tidak perlu memasukkan argument, di eksekusi ketika program selesai
  // biasa digunakan untuk menutup koneksi ke db atau menutup proses menulis ke file
  function __destruct() {
    echo "Object $this->name is destroyed" . PHP_EOL;
  }

  function sayHello(?string $name) {
    if (is_null($name)) {
      echo "Hi, my name is $this->name" . PHP_EOL; 
    } else {
      echo "Hi $name, my name is $this->name" . PHP_EOL; 
    }
  }

  function info() {
    echo "Author : " . self::AUTHOR . PHP_EOL;
  }
}