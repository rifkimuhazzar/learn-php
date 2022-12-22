<?php

class Person {
  // properties | fields | attributes = ketiganya sama saja
  // gunakan var di awal untuk membuat property
  // type declaration pada properties setelah var
  // php memiliki fitur type juggling
  // default value properties setelah nama variable
  // gunakan ? sebelum type agar bisa memasukkan nilai nullable
  var ?string $name;
  var string $role;
  var string $city = "Singapore";

  // function | method | behave = ketiganya sama saja
  function sayHello(string $name) {
    echo "Hello $name" . PHP_EOL;
  }
}