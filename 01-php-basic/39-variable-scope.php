<?php

// Global Scope | hanya bisa di akses di luar function
$name = "Rifki";

function sayHello() {
  // Local Scope | hanya bisa di akses di dalam function sendiri
  // echo "Hello $name" . PHP_EOL; // error tidak bisa mengakses variable scope dari dalam function

  global $name; // gunakan global keyword untuk mengakses variable global scope
  echo $name . PHP_EOL;
  $role = "Web Developer";
  
  echo $GLOBALS["name"] . PHP_EOL;
}
sayHello();
// echo $role . PHP_EOL; // error tidak bisa mengakses variable local scope dari global scope

// variable global scope akan disimpan di dalam array variable $GLOBALS
// $GLOBALS bersifat superglobal, artinya bisa diakses dari scope manapun
// var_dump($GLOBALS); 

// Static Scope
function increment() {
  // jika menggunakan staticmaka siklus hidupnya akan terus-menerus
  // static hanya bisa digunakan di local scope / di dalam function
  static $counter = 1; 

  echo "Counter = $counter" . PHP_EOL;

  $counter++;
}
increment();
increment();
increment();